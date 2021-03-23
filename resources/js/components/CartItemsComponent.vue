<template>
    <div >
        <div v-for="(item , index) in carts" :key="index"
                         class="media align-items-center">
                        <img alt="donuts"
                           class="d-block rounded mr-1"
                           :src="item.image"
                           width="62">
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
                            <h6>
                                <x-icon size="1.5x" class="ficon cart-item-remove"></x-icon>
                            </h6>
                        </div>
                    </div>
    </div>
</template>

<script>
import {XIcon} from "vue-feather-icons";

    export default {
        data () {
            return {
                carts:[],
                trans:[],
                totalPrice:0
            }
        },
        components: {
            XIcon
        },
        props:['user'],
        mounted() {
            this.getThisUserCarts();
        },
        computed: {

        },
        methods:{
           async getThisUserCarts() {
                let user_id =this.user.id;
                let url = '/api/v1/carts/'+user_id;
                this.carts.length = 0
                await axios.get(url).then(response => {
                    this.carts = response.data.data
                    this.trans = response.data.trans
                });


                },
        }
    }
</script>
