<?php

namespace App\Modules\Users\Controllers\Api;

use App\Jobs\SyncData;
use App\Modules\BaseApp\Enums\ResourceTypes;
use App\Modules\Integration\Enums\IntegrationEnum;
use App\Modules\Users\Requests\Api\CompleteProfileFirstStepRequest;
use App\Modules\Users\Requests\Api\CompleteProfileSecondStepRequest;
use App\Modules\Users\Requests\Api\UpdateProfilePictureRequest;
use App\Modules\Users\Requests\Api\UsersRequest;
use App\Modules\Users\Transformers\UserAuthTransformer;
use Illuminate\Support\Facades\Auth;
use Swis\JsonApi\Client\Interfaces\ParserInterface;
use App\Modules\BaseApp\Controllers\BaseApiController;
use App\Modules\Users\Models\Customer;
use App\Modules\Users\Requests\Api\CompleteProfileRequest;
use App\Modules\Users\Requests\Api\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileApiController extends BaseApiController
{
    public $parserInterface;
    private $user;

    public function __construct(ParserInterface $parserInterface)
    {
        $this->parserInterface = $parserInterface;
        $this->user = Auth::guard('api')->user();

    }

    public function getProfile(UsersRequest $request) {

        $meta = [
            'complet-data-flags'  => getUserCompletDataFlags($this->user)
        ];
        return $this->transformDataModInclude($this->user , 'customer', new UserAuthTransformer() , ResourceTypes::USER , $meta);
    }

    //TODO::request validation through request
    public function updateProfile(UpdateProfileRequest $request)
    {

        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        $personal = $data->toArray();
        $customer = $data->customer;
        // dd($customer->toArray());
        if (!$this->user || is_null($this->user)) {
            Log::error("user not logged in");
            return $this->errorResponse(trans("app.Failed To Update Profile") , 403);
        }

        if ($data->password && $data->old_password) {

            if (Hash::check($data->old_password, $this->user->password) || (is_null($this->user->password) || empty($this->user->password))) {
                $personal["password"] = $data->password;
            }else {
                return $this->errorResponse(trans("app.Failed To Update Profile, old password is invalid"),422);
            }
        }

        if (array_key_exists("profile_picture" , $personal)) {

            $personal["profile_picture"] = moveSingleGarbageMedia($personal["profile_picture"]);
        }
        $this->user->update($personal);
        if (!empty($customer)) {
            if ($customer->employment_document) {
                $customer["employment_document"] = moveSingleGarbageMedia($customer->employment_document);
            }
            if ($customer->utility_bill) {
                $customer["utility_bill"] = moveSingleGarbageMedia($customer->utility_bill);
            }
            if ($customer->national_id_image_front) {
                $customer["national_id_image_front"] = moveSingleGarbageMedia($customer->national_id_image_front);
            }
            if ($customer->national_id_image_back) {
                $customer["national_id_image_back"] = moveSingleGarbageMedia($customer->national_id_image_back);
            }
            if ($customer->income_proof) {
                $customer["income_proof"] = moveSingleGarbageMedia($customer->income_proof);
            }
            if ($customer->hr_document) {
                $customer["hr_document"] = moveSingleGarbageMedia($customer->hr_document);
            }


            Customer::updateOrCreate(["user_id" => $this->user->id], $customer->toArray());
        }
        return $this->successResponse([
            'meta' => [
                'message' => trans('app.Profile Updated successfully')
            ]
        ]);
    }

    public function updateProfilePicture(UpdateProfilePictureRequest $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();

        $this->user->update([
            'profile_picture' => moveSingleGarbageMedia($data["profile_picture"])
        ]);
        return $this->successResponse([
            'meta' => [
                'message' => trans('app.Profile Picture Updated successfully')
            ]
        ]);

    }

    public function completeProfileFirstStep(CompleteProfileFirstStepRequest $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();


        if ($data->gender_id) {
            $this->user->gender_id = $data->gender_id;
            $this->user->save();
        }

        $customerData = $data->toArray();

        if (array_key_exists("national_id_image_front" , $customerData)) {

            $customerData["national_id_image_front"] = moveSingleGarbageMedia($customerData["national_id_image_front"]);
        }

        if (array_key_exists("national_id_image_back" , $customerData)) {

            $customerData["national_id_image_back"] = moveSingleGarbageMedia($customerData["national_id_image_back"]);
        }
        if (!array_key_exists("passport_number" , $customerData)) {

            $customerData["passport_number"] = null;
        }
        if (!array_key_exists("national_id" , $customerData)) {

            $customerData["national_id"] = null;
        }

        Customer::updateOrCreate(["user_id"=>$this->user->id],$customerData);


        return $this->successResponse([
            'meta' => [
                'message' => trans('app.Profile Completed successfully')
            ]
        ]);
    }
    public function completeProfileSecondStep(CompleteProfileSecondStepRequest $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();


        $customerData = $data->toArray();

        $dataToInsert=null;
        if ($customerData['work_type'] == 'corporate'){

            $customerData['net_income']=null;
            $customerData['hr_document']=null;
            $customerData['work_field']=null;
            $customerData['income_proof']=null;
            $customerData['additional_monthly_income']=null;

        }elseif ($customerData['work_type'] == 'employed'){

            $customerData['employment_document']=null;
            $customerData['utility_bill']=null;
            $customerData['work_field']=null;
            $customerData['income_proof']=null;

        }elseif ($customerData['work_type'] == 'self_employed'){

            $customerData['company_name']=null;
            $customerData['company_address']=null;
            $customerData['employment_document']=null;
            $customerData['utility_bill']=null;
            $customerData['hr_document']=null;
            $customerData['additional_monthly_income']=null;

        }

        $customerToupdate = Customer::where("user_id",$this->user->id)->first();
        if (empty($this->user->gender_id) || empty($customerToupdate->nationality_id) ||
            empty($customerToupdate->marital_status) ||empty($customerToupdate->national_id)){
            return $this->errorResponse(trans('profile.complete basic info first'),422);

        }
            //@Todo::Handle Delete Images
        if (array_key_exists("employment_document" , $customerData)) {
            $customerData["employment_document"] = moveSingleGarbageMedia($customerData["employment_document"]);
            if ($customerData["employment_document"] == null && !empty($customerToupdate)){
                if (!empty($customerToupdate->employment_document)){
                    removeFromStorage($customerToupdate->employment_document);
                }
            }
        }

        if (array_key_exists("utility_bill" , $customerData)) {
            $customerData["utility_bill"] = moveSingleGarbageMedia($customerData["utility_bill"]);
            if ($customerData["utility_bill"] == null  && !empty($customerToupdate)){
                if (!empty($customerToupdate->utility_bill)){
                    removeFromStorage($customerToupdate->utility_bill);
                }
            }
        }

        if (array_key_exists("income_proof" , $customerData)) {
            $customerData["income_proof"] = moveSingleGarbageMedia($customerData["income_proof"]);
            if ($customerData["income_proof"] == null  && !empty($customerToupdate)){
                removeFromStorage($customerToupdate->income_proof);
            }
        }

        if (array_key_exists("hr_document" , $customerData)) {
            $customerData["hr_document"] = moveSingleGarbageMedia($customerData["hr_document"]);
            if ($customerData["hr_document"] == null  && !empty($customerToupdate)){
                if (!empty($customerToupdate->hr_document)){
                    removeFromStorage($customerToupdate->hr_document);
                }
            }
        }
//        return $customerData;

        Customer::updateOrCreate(["user_id"=>$this->user->id],$customerData);

        return $this->successResponse([
            'meta' => [
                'message' => trans('app.Profile Completed successfully')
            ]
        ]);
    }
}
