<template>
    <div >
        <!-- Fixed Center Placement Toast Starts -->
        <li class="nav-item dropdown dropdown-cart mr-25"
            v-if="carts.length > 0"
            v-on:click="reload">
            <a class="nav-link" data-toggle="dropdown"  href="javascript:void(0);">
                <shopping-cart-icon size="2x" class="custom-class"></shopping-cart-icon>
                <span class="badge badge-pill badge-primary badge-up cart-item-count" id="cart_length">
                    {{carts.length}}
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                    <div class="dropdown-header d-flex">
                        <h4 class="notification-title mb-0 mr-auto">
                            {{trans.my_cart}}
                        </h4>
                        <div class="badge badge-pill badge-light-primary">
                            {{carts.length}}
                        </div>
                    </div>
                </li>
                <li class="scrollable-container media-list">
                    <div v-for="(item , index) in carts" :key="index"
                         class="media align-items-center">
                        <div class="avatar m-1">
                            <img alt="avatar"
                                 height="32"
                                 :src="item.image"
                                 width="32">
                        </div>

                        <div class="media-body">
                            <div class="media-heading">
                                <h6 class="cart-item-title">
                                    <a class="text-body" :href="'/customer-product/view/'+item.product_id">
                                    {{item.product.title}}</a>
                                </h6>
                            </div>

                            <div class="cart-item-qty">
                                   {{item.amount}}
                            </div>

                            <h5 class="cart-item-price">{{ item.price }}</h5>
                            <h6 v-on:click="deleteProductFromCarts(item.id)">
                                <x-icon size="1.5x" class="ficon cart-item-remove"></x-icon>
                            </h6>
                        </div>
                    </div>
                </li>
                <br>
                <li class="dropdown-menu-footer">
                    <div class="d-flex justify-content-between mb-1">
                        <h6 class="font-weight-bolder mb-0">{{trans.total}}:</h6>
                        <h6 class="text-primary font-weight-bolder mb-0">
                            {{total}}</h6>
                    </div>
                    <a class="btn btn-primary btn-block" href="/customer-orders/checkout">{{trans.checkout}}</a>
                </li>
            </ul>
        </li>
        <!-- Fixed Center Placement Toast ends -->
    </div>
</template>

<script>
import {XIcon ,ShoppingCartIcon } from "vue-feather-icons";

    export default {
        data () {
            return {
                carts:[],
                trans:[],
                totalPrice:0
            }
        },
        components: {
            XIcon,
            ShoppingCartIcon
        },
        props:['user'],
        mounted() {
            this.getThisUserCarts();
        },
        computed: {
            total: function () {
                return this.carts.reduce(function (total, item) {
                    return parseInt(total) + parseInt(item.price);
                }, 0);
            },
            newOrder:function (){
                return this.$store.state.newOrder;
            },
        },
        watch: {
            newOrder: function(newVal, oldVal) {
                this.carts.length =0
                this.getThisUserCarts()
            },
        },
        methods:{
           async getThisUserCarts() {
                let user_id =this.user.id;
                let url = '/api/v1/carts/get-user-carts/'+user_id;
                this.carts.length = 0
                await axios.get(url).then(response => {
                    if (response.data.code === 200){
                        this.carts = response.data.data.data
                        this.trans = response.data.data.trans
                    }else{
                        alert(response.data.message);console.log(response.data.message)

                    }
                });
           },
           reload(){
               this.carts.length =0;
               this.getThisUserCarts()
            },
           async deleteProductFromCarts(product_id){
                let url = '/api/v1/carts/delete/'+product_id;
                await axios.get(url).then(response => {
                    if (response.data.code === 200){
                        this.reload()
                    }else{
                        alert(response.data.message);console.log(response.data.message)

                    }
                });

            },
        }
    }
</script>
