<template>
    <div  class="form-group">
        <div class="row mg-t-20 mb-1">
            <label class="col-sm-! form-control-label">
                {{ row.trans.method}}
                <span class="tx-danger">*
                </span>
            </label>
            <div class="col-sm-11 mg-t-10 mg-sm-t-0">
                <select class="form-control" name="type" v-model="MethodId">
                    <option selected disabled>
                        {{row.trans.select_method}}</option>
                    <option v-for="(method , index) in methods"
                            :key="index"
                            v-bind:value="method.id">{{ method.title }}</option>
                </select>
            </div>
        </div>

        <hr>

        <div v-if="MethodId ==='bank_account'" class="row mg-t-20 mb-1">
            <label class="col-sm-! form-control-label">
                {{ row.trans.bank_account_number}}
                <span class="tx-danger">*
                </span></label>
            <div class="col-sm-11 mg-t-10 mg-sm-t-0">
                    <div class="form-group">
                        <input id="bank_account_number"
                               :placeholder="row.trans.bank_account_number"
                               required="required"
                               name="bank_account_number"
                               type="text"
                               class="form-control col-sm-10">
                </div>
            </div>
        </div>
        <div v-if="MethodId ==='e_wallet'" class="row mg-t-20 mb-1">
            <label class="col-sm-! form-control-label">
                {{ row.trans.e_wallet_number}}
                <span class="tx-danger">*
                </span></label>
            <div class="col-sm-11 mg-t-10 mg-sm-t-0">
                    <div class="form-group">
                        <input id="e_wallet_number"
                               :placeholder="row.trans.e_wallet_number"
                               required="required"
                               name="e_wallet_number"
                               type="text"
                               class="form-control col-sm-10">
                </div>
            </div>
        </div>
        <div v-if="MethodId ==='post'"class="row mg-t-20 mb-1">
            <label class="col-sm-! form-control-label">
                {{ row.trans.national_id}}
                <span class="tx-danger">*
                </span></label>
            <div class="col-sm-11 mg-t-10 mg-sm-t-0">
                    <div class="form-group">
                        <input id="national_id"
                               :placeholder="row.trans.national_id"
                               required="required"
                               name="national_id"
                               type="text"
                               class="form-control col-sm-10">
                </div>
            </div>
        </div>

        <input type="hidden" name="user_id" :value="row.user.id">
    </div>

</template>

<script>
    export default {

        data () {
            return {
                methods :[],
                MethodId:null
            };
        },
        props: ['row'],

        created() {
            this.getMethods();
        },
        methods:{
            getMethods(){
                axios.get('/api/v1/payment_methods/'+this.row.user.id)
                    .then((response)=>{
                        this.methods = response.data;
                    })
            },
        }
    }
</script>
