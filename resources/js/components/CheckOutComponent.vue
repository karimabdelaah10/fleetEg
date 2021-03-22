<template>
    <div>
        <!-- Wizard starts -->
        <div class="bs-stepper-header">
            <div class="step" data-target="#step-cart">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">
                      <i data-feather="shopping-cart" class="font-medium-3"></i>
                    </span>
                    <span class="bs-stepper-label">
                      <span class="bs-stepper-title">{{row.trans.orders_cart}}</span>
                      <span class="bs-stepper-subtitle">{{row.trans.orders_cart_products}}</span>
                    </span>
                </button>
            </div>
            <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
            </div>
            <div class="step" data-target="#step-address">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">
                      <i data-feather="home" class="font-medium-3"></i>
                    </span>
                    <span class="bs-stepper-label">
                    <span class="bs-stepper-title">{{row.trans.orders_customer_details}}</span>
                      <span class="bs-stepper-subtitle">{{row.trans.orders_customer_details}}</span>
                    </span>
                </button>
            </div>
        </div>
        <!-- Wizard ends -->
        <div class="bs-stepper-content">
            <!-- Checkout Place order starts -->
            <div id="step-cart" class="content">
                <div id="place-order" class="list-view product-checkout">
                    <!-- Checkout Place Order Left starts -->
                    <div class="checkout-items">
                        <div class="card ecommerce-card" v-for="(item , index) in carts" :key="index">
                            <div class="item-img">
                                <a :href="'/product/view/'+item.product_id">
                                    <img :src="item.image" alt="img-placeholder"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-name">
                                    <h6 class="mb-0">
                                        <a :href="'/product/view/'+item.product_id" class="text-body">
                                            {{item.product.title}}</a>
                                    </h6>
                                </div>
                                <div class="item-quantity">
                                    <span class="quantity-title">{{row.trans.amount}}: {{item.amount}}</span>

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
                                <button type="button" class="btn btn-light mt-1 remove-wishlist">
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
                                            <div class="detail-amt">598</div>
                                        </li>
                                        <li class="price-detail">
                                            <div class="detail-title"> {{row.trans.product_discount}}  Bag Discount</div>
                                            <div class="detail-amt discount-amt text-success">
                                                    <span>-</span>25
                                            </div>
                                        </li>
                                    </ul>
                                    <hr/>
                                    <ul class="list-unstyled">
                                        <li class="price-detail">
                                            <div class="detail-title detail-total">{{row.trans.total_price}}</div>
                                            <div class="detail-amt font-weight-bolder">574</div>
                                        </li>
                                    </ul>
                                    <div  data-target="#step-address">
                                        <button type="button" class="btn btn-primary btn-block btn-next place-order">{{row.trans.complete_order}}</button>
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
                                               name="fname"
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
                                            name="mnumber"
                                            :placeholder="row.trans.customer_mobile_number"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label for="checkout-apt-number">{{row.trans.customer_area}}:</label>
                                        <input
                                            type="number"
                                            id="checkout-apt-number"
                                            class="form-control"
                                            name="apt-number"
                                            :placeholder="row.trans.customer_area"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label for="add-type">{{row.trans.governorate}}:</label>
                                        <select class="form-control" id="add-type">
                                            <option>Home</option>
                                            <option>Work</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group mb-2">
                                       <textarea
                                           name=""
                                           cols="80"
                                           rows="3"
                                       >
                                           {{row.trans.customer_address}}
                                       </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group mb-2">
                                       <textarea
                                           name=""
                                           cols="80"
                                           rows="3"
                                       >
                                           {{row.trans.shipping_notes}}
                                       </textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary btn-next delivery-address">
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
                                                <div class="detail-amt">598</div>
                                            </li>
                                            <li class="price-detail">
                                                <div class="detail-title"> {{row.trans.product_discount}}  Bag Discount</div>
                                                <div class="detail-amt discount-amt text-success">
                                                    <span>-</span>25
                                                </div>
                                            </li>
                                        </ul>
                                        <hr/>
                                        <ul class="list-unstyled">
                                            <li class="price-detail">
                                                <div class="detail-title detail-total">{{row.trans.total_price}}</div>
                                                <div class="detail-amt font-weight-bolder">574</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout Place Order Right ends -->
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">John Doe</h4>
                            </div>
                            <div class="card-body actions">
                                <p class="card-text mb-0">9447 Glen Eagles Drive</p>
                                <p class="card-text">Lewis Center, OH 43035</p>
                                <p class="card-text">UTC-5: Eastern Standard Time (EST)</p>
                                <p class="card-text">202-555-0140</p>
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
            carts:[]
            }
        },
        components: {
        },
        props:['row'],
        mounted() {
            this.getThisUserCarts();
        },
        computed: {
            // total: function () {
            //     return this.carts.reduce(function (total, item) {
            //         return total + item.price;
            //     }, 0);
            // },
            // newOrder:function (){
            //     return this.$store.state.newOrder;
            // },
        },
        watch: {
            // newOrder: function(newVal, oldVal) {
            //     console.log('in cart comp'+newVal)
            //     this.carts.length =0
            //     this.getThisUserCarts()
            // },
        },
        methods:{
           async getThisUserCarts() {
                let user_id =this.row.user.id;
                let url = '/api/v1/carts/'+user_id;
                this.carts.length = 0
                await axios.get(url).then(response => {
                    this.carts = response.data.data
                    console.log(this.carts)
                });
                },
           //  reload(){
           //     this.carts.length =0;
           //     this.getThisUserCarts()
           //  },
           //  async deleteProductFromCarts(product_id){
           //      let url = '/api/v1/carts/delete/'+product_id;
           //      await axios.get(url).then(response => {
           //          this.reload()
           //      });
           //
           //  }
        }
    }
</script>
