<template>
<div>
 <!-- Wizard starts -->
 <div class="bs-stepper-header">
     <!-- Product Details starts -->
    <div class="step" data-target="#step-cart">
<!--        <toast-component-->
<!--            :data ="toastData"-->
<!--        ></toast-component>-->
        <button type="button" class="step-trigger">
            <span class="bs-stepper-box">
              <i data-feather="shopping-cart"
                 class="font-medium-3">
              </i>
            </span>
            <span class="bs-stepper-label">
              <span class="bs-stepper-title">
                  {{row.trans.orders_cart}}
              </span>
              <span class="bs-stepper-subtitle">
                  {{row.trans.orders_cart_products}}
              </span>
            </span>
        </button>
    </div>
    <div class="line">
        <i data-feather="chevron-right"
           class="font-medium-2">
        </i>
    </div>
    <div class="step"
         data-target="#step-address">
        <button type="button" class="step-trigger">
            <span class="bs-stepper-box">
              <i data-feather="home"
                 class="font-medium-3">
              </i>
            </span>
            <span class="bs-stepper-label">
            <span class="bs-stepper-title">
                {{row.trans.orders_customer_details}}
            </span>
              <span class="bs-stepper-subtitle">
                  {{row.trans.orders_customer_details}}
              </span>
            </span>
        </button>
    </div>
</div>
 <!-- Wizard ends -->
 <div class="bs-stepper-content">
    <!-- Checkout Place order starts -->
    <div id="step-cart" class="content">
        <div id="place-order"
             class="list-view product-checkout">
            <!-- Checkout Place Order Left starts -->
            <div class="checkout-items">
                <div class="card ecommerce-card"
                     v-for="(item , index) in carts"
                     :key="index">
                    <div class="item-img">
                        <a :href="'/customer-product/view/'+item.product_id">
                            <img :src="item.image"
                                 alt="img-placeholder"/>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="item-name">
                            <h6 class="mb-0">
                                <a :href="'/customer-product/view/'+item.product_id"
                                   class="text-body">
                                    {{item.product.title}}</a>
                            </h6>
                        </div>
                        <div class="item-quantity">
                            <span class="quantity-title">
                                {{row.trans.amount}}: {{item.amount}}
                            </span>
                        </div>
                        <span class="delivery-date text-muted">{{item.spec_value.title}}</span>
                        <span class="delivery-date text-muted"  v-if="item.inner_spec_value != null">{{item.inner_spec_value.title}}</span>
                    </div>
                    <div class="item-options text-center">
                        <div class="item-wrapper">
                            <div class="item-cost">
                                <h4 class="item-price">{{row.trans.product_price}} : {{item.price}}</h4>
                                <p class="card-text shipping">
                                    <span class="badge badge-pill badge-light-success">{{row.trans.product_commission}} : {{item.commission}}</span>
                                </p>
                            </div>
                        </div>
                        <button type="button"
                                v-on:click="deleteProductFromCarts(item.id)"
                                class="btn btn-light mt-1 remove-wishlist">
                            <i data-feather="x" class="align-middle mr-25"></i>
                            <span>{{row.trans.remove_product_from_cart}}</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Checkout Place Order Left ends -->

            <!-- Checkout Place Order Right starts -->
            <div class="checkout-options">
                <div class="card">
                    <div class="card-body">
                        <hr/>
                        <div class="price-details">
                            <h6 class="price-title">{{row.trans.price_details}}</h6>
                            <ul class="list-unstyled">
                                <li class="price-detail">
                                    <div class="detail-title">{{row.trans.total_product_price}}</div>
                                    <div class="detail-amt">{{total}}</div>
                                </li>
                                <li class="price-detail"
                                    v-for="(discount , index) in discountDetails">
                                    <div class="detail-title">
                                        {{row.trans.product_discount}}
                                        {{discount.product_title}}</div>
                                    <div class="detail-amt discount-amt text-success">
                                            <span>-</span>{{discount.discount}}
                                    </div>
                                </li>
                                <li class="price-detail" v-if="shippingCoast > 0">
                                    <div class="detail-title">
                                        {{row.trans.shipping_coast}}
                                    </div>
                                    <div class="detail-amt">{{shippingCoast}}</div>
                                </li>

                            </ul>
                            <hr/>
                            <ul class="list-unstyled">
                                <li class="price-detail">
                                    <div class="detail-title
                                     detail-total">
                                        {{row.trans.total_price}}
                                    </div>
                                    <div class="detail-amt
                                    font-weight-bolder">
                                        {{totalPrice}}</div>
                                </li>
                            </ul>
                            <div  data-target="#step-address">
                                <button type="button"
                                        class="btn btn-primary btn-block btn-next place-order"
                                >
                                    {{row.trans.complete_order}}
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Checkout Place Order Right ends -->
            </div>
        </div>
        <!-- Checkout Place order Ends -->
    </div>
    <!-- Checkout Customer Address Starts -->
    <div id="step-address" class="content">
        <form id="checkout-address" class="list-view product-checkout">
            <!-- Checkout Customer Address Left starts -->
            <div class="card co">
                <div class="card-header flex-column align-items-start">
                    <h4 class="card-title">
                        {{row.trans.customer_details}}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mb-2">
                                <label for="checkout-name">{{row.trans.customer_name}} :</label>
                                <input type="text"
                                       id="checkout-name"
                                       class="form-control"
                                       required="required"
                                       v-model="selectedData.customer_name"
                                       :placeholder="row.trans.customer_name"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mb-2">
                                <label for="checkout-number">{{row.trans.customer_mobile_number}} :</label>
                                <input
                                    type="number"
                                    id="checkout-number"
                                    class="form-control"
                                    required="required"
                                    v-model="selectedData.customer_mobile_number"
                                    :placeholder="row.trans.customer_mobile_number"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mb-2">
                                <label for="checkout-apt-number">{{row.trans.customer_area}}:</label>
                                <input
                                    type="text"
                                    id="checkout-apt-number"
                                    required="required"
                                    class="form-control"
                                    v-model="selectedData.customer_area"
                                    :placeholder="row.trans.customer_area"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mb-2">
                                <label for="add-type">{{row.trans.governorate}}:</label>
                                <select class="form-control" v-model="shippingGovernorate" id="add-type">
                                    <option selected disabled>{{row.trans.governorate}}</option>
                                    <option :value="governorate"
                                        v-for="(governorate , index) in governorates" :key="index">
                                        {{ governorate.title }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label for="store_name">{{row.trans.store_name}}:</label>
                                <input
                                    type="text"
                                    id="store_name"
                                    class="form-control"
                                    v-model="selectedData.store_name"
                                    :placeholder="row.trans.store_name"
                                />
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group mb-2">
                               <textarea
                                   required="required"
                                   cols="80"
                                   rows="3"
                                   :placeholder="row.trans.customer_address"
                                   v-model="selectedData.customer_address"
                               >
                               </textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group mb-2">
                               <textarea
                                   cols="80"
                                   rows="3"
                                   :placeholder="row.trans.shipping_notes"
                                   v-model="selectedData.shipping_note"
                               >
                                   {{row.trans.shipping_notes}}
                               </textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button
                                :disabled="checkOutBtnDisables"
                                type="button"
                                class="btn btn-primary btn-next delivery-address"
                                v-on:click="checkout"
                            >
                                {{row.trans.checkout}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Checkout Customer Address Left ends -->

            <!-- Checkout Customer Address Right starts -->
            <div class="customer-card">
                <div class="checkout-options">
                    <div class="card">
                        <div class="card-body">
                            <hr/>
                            <div class="price-details">
                                <h6 class="price-title">{{row.trans.price_details}}</h6>
                                <ul class="list-unstyled">
                                    <li class="price-detail">
                                        <div class="detail-title">{{row.trans.total_product_price}}</div>
                                        <div class="detail-amt">{{total}}</div>
                                    </li>
                                    <li class="price-detail"
                                        v-for="(discount , index) in discountDetails">
                                        <div class="detail-title">
                                            {{row.trans.product_discount}}
                                            {{discount.product_title}}</div>
                                        <div class="detail-amt discount-amt text-success">
                                            <span>-</span>{{discount.discount}}
                                        </div>
                                    </li>
                                    <li class="price-detail" v-if="shippingCoast > 0">
                                        <div class="detail-title">
                                            {{row.trans.shipping_coast}}
                                        </div>
                                        <div class="detail-amt">{{shippingCoast}}</div>
                                    </li>
                                </ul>
                                <hr/>
                                <ul class="list-unstyled">
                                    <li class="price-detail">
                                        <div class="detail-title
                                     detail-total">
                                            {{row.trans.total_price}}
                                        </div>
                                        <div class="detail-amt
                                    font-weight-bolder">
                                            {{totalPrice}}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Place Order Right ends -->
                </div>

                <div class="card" v-if="!checkOutBtnDisables">
                    <div class="card-header">
                        <h4 class="card-title">{{selectedData.customer_name}}</h4>
                    </div>
                    <div class="card-body actions">
                        <p class="card-text mb-0">{{selectedData.customer_area}}</p>
                        <p class="card-text">{{selectedData.customer_address}}</p>
                        <p class="card-text">{{shippingGovernorate.title}}</p>
                        <p class="card-text">{{ selectedData.customer_mobile_number }}</p>
                    </div>
                </div>
            </div>
            <!-- Checkout Customer Address Right ends -->
        </form>
    </div>
    <!-- Checkout Customer Address Ends -->
    <!-- </div> -->
 </div>
</div>
</template>

<script>

    export default {
        data () {
            return {
            carts:[],
            governorates:[],
            shippingGovernorate:{},
            toastData:{
                title:null,
                message:null,
                time:null
            },
            selectedData:{
                customer_name:null,
                customer_mobile_number:null,
                customer_area:null,
                customer_address:null,
                shipping_note:null,
                store_name:null,
                governorate_id:null,
                user_id:null,

            },
            shippingCoast:0,
            discountDetails:[],
            }
        },
        components: {
        },
        props:['row'],
        mounted() {
            this.getThisUserCarts();
            this.getGovernorates();
        },
        computed: {
            total: function () {
                return this.carts.reduce(function (total, item) {
                    return total + item.price;
                }, 0);
            },
            totalCommission: function () {
                return this.carts.reduce(function (totalCommission, item) {
                    return totalCommission + item.commission;
                }, 0);
            },
            totalPrice:function (){
              let totalDiscount = this.discountDetails.reduce(function (sum, item) {
                    return sum + item.discount;
                }, 0);
              return     this.total - totalDiscount + this.shippingCoast;
            },
            checkOutBtnDisables:function (){
                if( this.selectedData.customer_name &&
                    this.selectedData.customer_mobile_number &&
                    this.selectedData.customer_address &&
                    this.selectedData.customer_area &&
                    this.selectedData.governorate_id
                ){
                    return false;
                }
                return true;
                },
        },
        watch: {
            shippingGovernorate: function(newVal, oldVal) {
               this.shippingCoast = newVal.shipping_coast
               this.selectedData.governorate_id = newVal.id
            },
        },
        methods:{
            async getGovernorates(){
                let url = '/api/v1/governorates/';
                this.carts.length = 0
                await axios.get(url).then(response => {
                    console.log(response)
                    if (response.data.code === 200){
                        this.governorates = response.data.data
                    }else{
                        this.displayToast(response.data.message.title ,
                            response.data.message.message, '');
                    }
                });
            },
           async getThisUserCarts() {
                let user_id =this.row.user.id;
                let url = '/api/v1/carts/get-user-carts/'+user_id;
                this.carts.length = 0
                await axios.get(url).then(response => {
                    if (response.data.code === 200){
                        this.carts = response.data.data.data
                        this.discountDetails = response.data.data.product_discounts_details
                        if (this.carts.length === 0 ){
                            location.reload()
                        }
                    }else{
                        this.displayToast(response.data.message.title ,
                            response.data.message.message, '');
                    }
                });
                },
            async deleteProductFromCarts(product_id){
                let url = '/api/v1/carts/delete/'+product_id;
                await axios.get(url).then(response => {
                    if (response.data.code === 200){
                        this.getThisUserCarts()
                        this.$store.commit('incementNewOrder')
                    }else{
                        this.displayToast(response.data.message.title ,
                            response.data.message.message, '');
                    }
                });
            },

            async checkout(){
                let url = '/api/v1/carts/checkout';
                let data = {
                    customer_name:this.selectedData.customer_name,
                    customer_mobile_number:this.selectedData.customer_mobile_number,
                    customer_area:this.selectedData.customer_area,
                    customer_address:this.selectedData.customer_address,
                    shipping_note:this.selectedData.shipping_note,
                    store_name:this.selectedData.store_name,
                    governorate_id:this.selectedData.governorate_id,
                    user_id:this.row.user.id,
                    total_price :this.totalPrice,
                    total_commission :this.totalCommission,
                };
                await axios.post(url , data).then(response => {
                    if (response.data.code === 200){
                        this.$store.commit('incementNewOrder')
                        this.displayToast(this.row.trans.order_saved_title ,
                            this.row.trans.order_saved_message,
                            this.row.trans.just_now)
                        setTimeout(() =>{
                                location.replace("/customer-orders")
                            }
                            , 2000);
                    }else{
                        this.displayToast(response.data.message.title ,
                            response.data.message.message, '');
                    }
                });
            } ,
            displayToast(title ,  message ,time){
                this.toastData.title = title
                this.toastData.time = time
                this.toastData.message = message

                $(".toast-placement .toast").toast("show");
                setTimeout(()=>{
                    $(".toast-placement .toast").toast("hide");
                } , 3000)
            },
        }
    }
</script>
