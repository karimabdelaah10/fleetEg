<template>
<div>
<!-- app e-commerce details start -->
<section class="app-ecommerce-details">
  <div class="card">
    <!-- Product Details starts -->
    <div class="card-body">
        <div class="row my-2">
            <div
                class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                <div class="d-flex align-items-center justify-content-center">
                    <img
                        :src="image"
                        class="img-fluid product-img"
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
                    <h4 class="item-price mr-1">
                        {{row.trans.price}} :
                        {{product.price}}
                        {{row.trans.eg}}
                    </h4>
                    <h4 class="item-price mr-1 border-left">
                        {{row.trans.commission}} :
                        {{product.price}}
                        {{row.trans.eg}}
                    </h4>
                </div>
                <p class="card-text">
                    {{row.trans.in_stock}}
                    -  <span class="text-success">
                    {{ stock }}
                    </span>
                </p>
                <p class="card-text">
                    {{product.description}}
                </p>
                <ul class="product-features list-unstyled">
<!--                    <li><i data-feather="shopping-cart"></i> <span>Free Shipping</span></li>-->
<!--                    <li>-->
<!--                        <i data-feather="dollar-sign"></i>-->
<!--                        <span>EMI options available</span>-->
<!--                    </li>-->
                </ul>
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



                <div class="d-flex flex-column flex-sm-row pt-1">
                    <a href="javascript:void(0)" class="btn btn-primary btn-cart mr-0 mr-sm-1 mb-1 mb-sm-0">
                        <i data-feather="shopping-cart" class="mr-50"></i>
                        <span class="add-to-cart">{{ row.trans.add_to_cart }}</span>
                    </a>



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

    <!-- Related Products starts -->
    <div class="card-body">
        <div
            class="mt-4 mb-2 text-center">
            <h4>Related Products</h4>
            <p class="card-text">
                People also search for this items
            </p>
        </div>
        <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
            <div class="swiper-wrapper">
                <div v-for="(item , index) in related_products"
                     :class="sliderClass(index)"
                >

                    <a href="javascript:void(0)">
                        <div class="item-heading">
                            <h5 class="text-truncate mb-0">{{ sliderClass(index) }}</h5>
                            <small class="text-body">by Apple</small>
                        </div>
                        <div class="img-container w-50 mx-auto py-75">
                            <img :src="item.image" class="img-fluid" alt="image" />
                        </div>
                        <div class="item-meta">
                            <ul class="unstyled-list list-inline mb-25">
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                            </ul>
                            <p class="card-text text-primary mb-0">$399.98</p>
                        </div>
                    </a>
                </div>
<!--                <div class="swiper-slide">-->
<!--                    <a href="javascript:void(0)">-->
<!--                        <div class="item-heading">-->
<!--                            <h5 class="text-truncate mb-0">Apple MacBook Pro - Silver</h5>-->
<!--                            <small class="text-body">by Apple</small>-->
<!--                        </div>-->
<!--                        <div class="img-container w-50 mx-auto py-50">-->
<!--                            <img src="/images/elements/macbook-pro.png" class="img-fluid" alt="image" />-->
<!--                        </div>-->
<!--                        <div class="item-meta">-->
<!--                            <ul class="unstyled-list list-inline mb-25">-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>-->
<!--                            </ul>-->
<!--                            <p class="card-text text-primary mb-0">$2449.49</p>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="swiper-slide">-->
<!--                    <a href="javascript:void(0)">-->
<!--                        <div class="item-heading">-->
<!--                            <h5 class="text-truncate mb-0">Apple HomePod (Space Grey)</h5>-->
<!--                            <small class="text-body">by Apple</small>-->
<!--                        </div>-->
<!--                        <div class="img-container w-50 mx-auto py-75">-->
<!--                            <img src="/images/elements/homepod.png" class="img-fluid" alt="image" />-->
<!--                        </div>-->
<!--                        <div class="item-meta">-->
<!--                            <ul class="unstyled-list list-inline mb-25">-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>-->
<!--                            </ul>-->
<!--                            <p class="card-text text-primary mb-0">$229.29</p>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="swiper-slide">-->
<!--                    <a href="javascript:void(0)">-->
<!--                        <div class="item-heading">-->
<!--                            <h5 class="text-truncate mb-0">Magic Mouse 2 - Black</h5>-->
<!--                            <small class="text-body">by Apple</small>-->
<!--                        </div>-->
<!--                        <div class="img-container w-50 mx-auto py-75">-->
<!--                            <img src="/images/elements/magic-mouse.png" class="img-fluid" alt="image" />-->
<!--                        </div>-->
<!--                        <div class="item-meta">-->
<!--                            <ul class="unstyled-list list-inline mb-25">-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                            </ul>-->
<!--                            <p class="card-text text-primary mb-0">$90.98</p>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="swiper-slide">-->
<!--                    <a href="javascript:void(0)">-->
<!--                        <div class="item-heading">-->
<!--                            <h5 class="text-truncate mb-0">iPhone 12 Pro</h5>-->
<!--                            <small class="text-body">by Apple</small>-->
<!--                        </div>-->
<!--                        <div class="img-container w-50 mx-auto py-75">-->
<!--                            <img src="/images/elements/iphone-x.png" class="img-fluid" alt="image" />-->
<!--                        </div>-->
<!--                        <div class="item-meta">-->
<!--                            <ul class="unstyled-list list-inline mb-25">-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>-->
<!--                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>-->
<!--                            </ul>-->
<!--                            <p class="card-text text-primary mb-0">$1559.99</p>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <!-- Related Products ends -->
  </div>
</section>
<!-- app e-commerce details end -->
</div>
</template>

<script>
import {HeartIcon ,ArrowRightIcon } from 'vue-feather-icons'

    export default {

        data () {
            return {
                product:[],
                inner_specs_values:[],
                related_products:[],
                stock: null,
                image: null,
            };
        },
        components: {
            HeartIcon,
            ArrowRightIcon
        },
        props: ['row'],

        computed:{},
        created() {},
        mounted() {
            feather.replace();
        },
        beforeMount() {
            this.fetch();

        },
        watch: {},
        methods:{
            async fetch () {
                let url = '/api/v1/products/view/'+ this.row.product.id+'?user_id='+this.row.user.id;
               await axios.get(url).then(response => {
                   this.product = response.data.data;
                   this.image = this.product.image;
                   this.related_products = response.data.related_products;
                   console.log(this.related_products)
                });
            },
           async toggleFavProduct(item){
                let data = {
                    'product_id':item.id,
                    'user_id': this.row.user.id
                };
                await axios.post('/api/v1/products/fav' ,data)
                    .then(response => {
                        if (response.data.status === 200){
                            item.is_favourite = !item.is_favourite;
                        }
                    });
            },
            async selectSpecValue(specValue){
                let newImage ='#';
                let newStock = '#';
                let url = '/api/v1/products/inner-spec-values/'+specValue.pivot_id+'?product_id='+this.product.id;
                await axios.get(url).then(response => {
                    this.inner_specs_values = response.data;
                        if (this.inner_specs_values.length === 0){
                             newImage = specValue.image;
                             newStock = specValue.stock;
                        }else{
                            newImage = specValue.image;
                            newStock = '#';
                        }
                    this.toggleImageAndStock(newImage , newStock);

                });

            },
            selectInnerSpecValue(innerSpecValue){
                this.toggleImageAndStock(innerSpecValue.image , innerSpecValue.stock)
            },
            toggleImageAndStock(image , stock){
                this.image = image
                this.stock = stock

            },
            sliderClass(slideIndex) {
                if (slideIndex === 0 ){
                    return  'swiper-slide active'
                }else if(slideIndex === 1){
                    return 'swiper-slide next'
                }else{
                    return  'swiper-slide';
                }
            }
        }
    }


</script>
<style scoped>
#more_btn{
    width: 100%;
    background-color: #fff;
}
.favourite_product{

}
</style>
