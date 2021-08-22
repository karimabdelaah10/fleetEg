<template>
<div>
<!-- app e-commerce details start -->
<section class="app-ecommerce-details">
  <div class="card">
<!--      <toast-component-->
<!--          :data ="toastData"-->
<!--      ></toast-component>-->
      <!-- Product Details starts -->
    <div class="card-body">
        <div class="row my-2">
            <div
                class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                <div
                    class="d-flex align-items-center justify-content-center">
                    <img
                        :src="image"
                        class="img-fluid product-img one-product-img"
                        alt="product image"
                    />
                </div>
            </div>
            <div class="col-12 col-md-7">
                <h4>{{product.title}}</h4>
                <span class="card-text item-company">
                    {{product.category}}
                </span>
                <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                    <h4 class="item-price mr-1 danger">
                        {{row.trans.price}} :
                        {{product.price}}
                        {{row.trans.eg}}
                    </h4>
                </div>
                <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                    <h4 class="item-price mr-1 border-left">
                        {{row.trans.commission}} :
                        {{product.commission}}
                        {{row.trans.eg}}
                    </h4>
                </div>
                <p class="card-text">
                    {{product.description}}
                </p>
                <hr />

                <div class="product-color-options"
                     v-for="(spec , index) in product.specs"
                >
                    <h6>{{spec.title}}</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="d-inline-block"
                            v-for="(specValue , index) in spec.specs_values"
                            v-on:click="selectSpecValue(specValue)"
                        >
                            <div class="color-option b-primary">
                                {{specValue.title}}
                            </div>
                        </li>

                    </ul>
                </div>
                <hr />

                <div class="product-color-options"
                     v-for="(inner_spec , index) in inner_specs_values"
                >
                    <h6>{{inner_spec.title}}</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="d-inline-block"
                            v-for="(innerSpecValue , index) in inner_spec.specs_values"
                            v-on:click="selectInnerSpecValue(innerSpecValue)"
                        >
                            <div class="color-option b-primary">
                                {{innerSpecValue.title}}
                            </div>
                        </li>

                    </ul>
                    <hr />
                </div>

                <div class="product-color-options" v-if="!isDisabled">
                    <h6>{{row.trans.ordered_amount}}</h6>
                    <NumberInputSpinner
                        :min="1"
                        :max="stock"
                        :step="1"
                        :integerOnly="true"
                        :inputClass="'ordered_amount_input'"
                        :buttonClass="'ordered_amount_btn'"
                        v-model="selectdData.amount"
                    />
                    <br>
                    <hr />
                </div>

                <div class="product-color-options" v-if="!isDisabled">
                    <h6>{{ row.trans.price_change}}</h6>
                    <div class="row mg-t-20 mb-1">
                        <div class="col-sm-8 mg-t-2 mg-sm-t-0">
                            <select class="form-control"  name="type"
                                    v-model="selectdData.commission_diffrence_type" v-on:change="getCommissionMax">
                                <option value="none">{{row.trans.none_option}}</option>
                                <option value="overprice">{{row.trans.over_price_option}}</option>
                                <option value="discount">{{row.trans.discount_option}}</option>                            </select>
                        </div>
                        <div class="col-sm-4 mg-t-2 mg-sm-t-0">
                            <NumberInputSpinner
                                v-if="selectdData.commission_diffrence_type != 'none'"
                                :key="selectdData.commission_diffrence_amount"
                                :min="0"
                                :max="commisionMax"
                                :step="1"
                                :integerOnly="true"
                                :inputClass="'ordered_amount_input'"
                                :buttonClass="'ordered_amount_btn'"
                                v-model="selectdData.commission_diffrence_amount"
                            />
                        </div>
                    </div>
                    <br>
                    <hr />
                </div>
                <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                    <h4 class="item-price mr-1 border-left">
                        {{ row.trans.in_stock}} :
                        {{ stock }}
                    </h4>
                </div>

                <div class="d-flex flex-column flex-sm-row pt-1">
                    <button href=""
                            class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0 "
                            :disabled='isDisabled'
                            v-on:click="addProductToCart"
                    >
                        <i data-feather="shopping-cart" class="mr-50"></i>
                        <span class="add-to-cart">
                            {{ row.trans.add_to_cart }}</span>
                    </button>

                    <a v-on:click="toggleFavProduct(product)"
                       v-if="!product.is_favourite"
                       class="btn btn-outline-secondary
                      mr-0 mr-sm-1 mb-1 mb-sm-0">
                        <heart-icon size="1.5x" fill="none" class="custom-class"></heart-icon>
                        <span>{{ row.trans.add_to_wish_list }}</span>
                    </a>
                    <a  v-on:click="toggleFavProduct(product)"
                        v-if="product.is_favourite"
                        class="btn btn-outline-secondary
                      mr-0 mr-sm-1 mb-1 mb-sm-0">
                        <heart-icon size="1.5x" fill="true" class="custom-class"></heart-icon>
                        <span>{{ row.trans.remove_from_wish_list }}</span>
                    </a>

                    <a :href="product.media_url"
                       class="btn btn-outline-success
                      mr-0 mr-sm-1 mb-1 mb-sm-0">
                        <image-icon size="1.5x" class="custom-class"></image-icon>
                        <span>{{ row.trans.media_url }}</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!-- Product Details ends -->

    <!-- Item features starts -->
    <div class="item-features">
        <div class="row text-center">
        </div>
    </div>
    <!-- Item features ends -->
 </div>
</section>
<!-- app e-commerce details end -->
</div>
</template>

<script>
import {HeartIcon ,ArrowRightIcon ,ImageIcon  } from 'vue-feather-icons'
import NumberInputSpinner from 'vue-number-input-spinner'

    export default {

        data () {
            return {
                product:[],
                inner_specs_values:[],
                related_products:[],
                toastData:{
                    title:null,
                    message:null,
                    time:null
                },
                commisionMax:100000000,
                stock: 0,
                image: null,
                selectdData:{
                    product_id: null ,
                    price: null ,
                    commission: null ,
                    user_id: null ,
                    spec_value_id: null ,
                    inner_spec_value_id: null ,
                    amount: 1 ,
                    commission_diffrence_type:'none',
                    commission_diffrence_amount: 0,

                },
                min :1,
                addToCaryBtn:false
            };
        },
        components: {
            HeartIcon,
            ArrowRightIcon,
            ImageIcon,
            NumberInputSpinner
        },
        props: ['row'],
        created() {},
        mounted() {
            feather.replace();
        },
        beforeMount() {
            this.fetch();

        },
        computed: {
            isDisabled: function(){
                if (this.selectdData.spec_value_id == null || this.stock == 0){
                    return true
                }
                return !this.addToCaryBtn;
            },
            totalPrice:function (){
                let finalPrice =0,
                    originalOneProductPrice  =0,
                    originalAllProductsPrice =0;
                originalOneProductPrice =this.product.price - this.product.commission;
                // console.log('oneproprice == '+ originalOneProductPrice)
                originalAllProductsPrice = originalOneProductPrice * this.selectdData.amount;
                // console.log('allproprice == '+ originalAllProductsPrice)
                // console.log('allcommiions == '+ this.totalCommission)
                finalPrice = originalAllProductsPrice + this.totalCommission;
                // console.log('final == '+ finalPrice)
                return finalPrice;
            },
            totalCommission:function (){
               let oneProductCommission =0,
                   allProductsCommission=0 ;
               if (this.selectdData.commission_diffrence_type == 'overprice'){
                    oneProductCommission = this.product.commission + this.selectdData.commission_diffrence_amount
                }else if(this.selectdData.commission_diffrence_type == 'discount'){
                    oneProductCommission = this.product.commission - this.selectdData.commission_diffrence_amount
                }else{
                    oneProductCommission = this.product.commission
                }
                // console.log('selctedAmount == '+ this.selectdData.commission_diffrence_amount)
                // console.log('oneprodcomm == '+ oneProductCommission)
                allProductsCommission= oneProductCommission * this.selectdData.amount;

               return allProductsCommission;
            }
        },
        watch: {},
        methods:{
      async fetch () {
                let url = '/api/v1/products/view/'+ this.row.product.id+'?user_id='+this.row.user.id;
               await axios.get(url).then(response => {
                   if (response.data.code === 200){
                       this.product = response.data.data;
                       this.image = this.product.image;
                   }else{
                       alert(response.data.message);console.log(response.data.message)
                   }
               });
            },
      async toggleFavProduct(item){
                let data = {
                    'product_id':item.id,
                    'user_id': this.row.user.id
                };
                await axios.post('/api/v1/products/fav' ,data)
                    .then(response => {
                        if (response.data.code === 200){
                            item.is_favourite = !item.is_favourite;
                        }else{
                           alert(response.data.message);console.log(response.data.message)
                        }
                    });
            },
      async selectSpecValue(specValue){
                let newImage ='#';
                let newStock = '#';
                let url = '/api/v1/products/inner-spec-values/'+specValue.pivot_id+'?product_id='+this.product.id;
                await axios.get(url).then(response => {
                    if (response.data.code === 200){
                        this.inner_specs_values = response.data.data;
                        this.selectdData.spec_value_id =specValue.id;
                        this.selectdData.inner_spec_value_id =null;
                       if (this.inner_specs_values.length === 0){
                            this.addToCaryBtn = true;
                            newImage = specValue.image;
                            newStock = specValue.stock;
                        }
                        else{
                            this.addToCaryBtn = false;
                            newImage = specValue.image;
                            newStock = '#';
                        }
                        this.toggleImageAndStock(newImage , newStock);
                    }else{
                        alert(response.data.message);console.log(response.data.message)
                    }
                });

            },
            selectInnerSpecValue(innerSpecValue){
                this.selectdData.inner_spec_value_id =innerSpecValue.value_id;
                this.addToCaryBtn = true;
                this.toggleImageAndStock(innerSpecValue.image , innerSpecValue.stock)
            },
            toggleImageAndStock(image , stock){
                this.image = image
                this.stock = stock

            },
      async addProductToCart() {
                 this.selectdData.product_id = this.product.id
                 this.selectdData.commission = this.totalCommission   // calculated in computed
                 this.selectdData.price = this.totalPrice             // calculated in computed
                 this.selectdData.image = this.image
                 this.selectdData.user_id = this.row.user.id
                 // console.log(this.selectdData)
                 let url = '/api/v1/products/add-to-cart';
                 await axios.post(url , this.selectdData).then(response => {
                     if (response.data.code === 200){
                         this.displayToast(this.row.trans.product_added_to_cart_title ,
                             this.row.trans.product_added_to_cart_message,
                             this.row.trans.just_now)
                         this.$store.commit('incementNewOrder')
                         this.resetSelectedData();
                     }else{
                         alert(response.data.message);console.log(response.data.message)
                     }
                 });
            },
            getCommissionMax(){
                this.selectdData.commission_diffrence_amount = 0;
              if (this.selectdData.commission_diffrence_type !='discount'){
                  this.commisionMax = 10000000
              }else{
                  this.commisionMax =this.product.commission;
              }
            },
            displayToast(title ,  message ,time){
                this.toastData.title = title
                this.toastData.time = time
                this.toastData.message = message

                $(".toast-placement .toast").toast("show");

                setTimeout(()=>{
                    $(".toast-placement .toast").toast("hide");
                } , 3000)
            },
            resetSelectedData(){
                this.selectdData ={
                    product_id: null ,
                    price: null ,
                    commission: null ,
                    user_id: null ,
                    spec_value_id: null ,
                    inner_spec_value_id: null ,
                    amount: 1 ,
                    commission_diffrence_type:'none',
                    commission_diffrence_amount: 0,
                }
            },
        }
    }


</script>
<style>
.one-product-img{
    height: 600px;
    width: 600px;
}
.ordered_amount_btn {
    -webkit-appearance: none;
    transition: background 0.5s ease;
    background: #7367f0;
    border: 0;
    color: #fff;
    cursor: pointer;
    float: left;
    font-size: 20px;
    height: 40px;
    margin: 0;
    width: 40px;
}
.ordered_amount_input {
    -webkit-appearance: none;
    border: 1px solid #ebebeb;
    float: left;
    font-size: 16px;
    height: 40px;
    margin: 0;
    outline: none;
    text-align: center;
    width: calc(100% - 80px);
}
</style>
