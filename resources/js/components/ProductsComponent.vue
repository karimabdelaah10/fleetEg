<template>
    <div>
        <div class="content-detached content-right">
<!--            <toast-component-->
<!--                :data ="toastData"-->
<!--            ></toast-component>-->
            <div class="content-body">
                <section id="ecommerce-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ecommerce-header-items">
                                <div class="result-toggler">
                                    <button class="navbar-toggler shop-sidebar-toggler"
                                            type="button" data-toggle="collapse">
                                        <span class="navbar-toggler-icon d-block d-lg-none">
                                            <i data-feather="menu"></i>
                                        </span>
                                    </button>
                                    <div class="search-results">
                                        {{row.trans.results_found}} : {{resultsCount}}
                                    </div>
                                </div>
                                <div class="view-options d-flex">
                                    <div class="btn-group btn-group-toggle"
                                         data-toggle="buttons">
                                        <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn">
                                            <input type="radio"
                                                   name="radio_options"
                                                   id="radio_option1"
                                                   checked />
                                            <i data-feather="grid"
                                               class="font-medium-3"></i>
                                        </label>
                                        <label class="btn btn-icon btn-outline-primary
                                        view-btn list-view-btn">
                                            <input type="radio"
                                                   name="radio_options"
                                                   id="radio_option2" />
                                            <i data-feather="list" class="font-medium-3"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Content Section Starts -->

                <!-- background Overlay when sidebar is shown  starts-->
                <div class="body-content-overlay"></div>
                <!-- background Overlay when sidebar is shown  ends-->

                <!-- E-commerce Search Bar Starts -->
                <section id="ecommerce-searchbar"
                         class="ecommerce-searchbar">
                    <div class="row mt-1">
                        <div class="col-sm-12">
                            <div class="input-group input-group-merge">
                                <input
                                    type="text"
                                    class="form-control search-product"
                                    id="shop-search"
                                    :placeholder="row.trans.search_in_products"
                                    aria-label="Search..."
                                    v-model="search_key"
                                    aria-describedby="shop-search"
                                />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i data-feather="search"
                                           class="text-muted">

                                        </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Search Bar Ends -->

                <!-- E-commerce Products Starts -->
                <section id="ecommerce-products" class="grid-view">
                    <div class="card ecommerce-card"
                         v-for="(item , index) in products"
                         :key="index">
                        <div class="item-img text-center">
                            <a :href="'/customer-product/view/'+item.id">
                                <img
                                    class="img-fluid card-img-top list-products-img"
                                    :src="item.image"
                                    alt="img-placeholder"
                                />
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-wrapper">
                                <h4 class="item-name">
                                    <a class="text-body" :href="'/customer-product/view/'+item.id">{{item.title}}</a>
                                </h4>
                                <br>
                            </div>
                            <h6 class="item-name">
                                <a class="text-body">{{item.category}}</a>
                            </h6>
                            <div class="item-rating">
                                <h6 class="item-price">
                                    <h6 class="item-price">{{ row.trans.price }} : {{item.price}}</h6>
                                </h6>
                            </div>
                            <div>
                                <h6 class="item-price">{{row.trans.commission}} : {{item.commission}}</h6>
                            </div>
<!--                            <p class="card-text item-description">-->
<!--                                {{item.description}}-->
<!--                                </p>-->
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-cost">
                                    <h4 class="item-price">{{ row.trans.price }} : {{item.price}}</h4>
                                </div>
                            </div>
                            <a v-on:click="toggleFavProduct(item)"
                               v-if="!item.is_favourite"
                               class="btn btn-light btn-wishlist">
                                <heart-icon size="1.5x" fill="none" class="custom-class"></heart-icon>
                                <span>{{ row.trans.add_to_wish_list }}</span>
                            </a>
                            <a  v-on:click="toggleFavProduct(item)"
                                v-if="item.is_favourite"
                                class="btn btn-light btn-wishlist">
                                <heart-icon size="1.5x" fill="true" class="custom-class"></heart-icon>
                                <span>{{ row.trans.remove_from_wish_list }}</span>
                            </a>
                            <a :href="'/customer-product/view/'+item.id" class="btn btn-primary btn-cart">
                                <arrow-right-icon size="1.5x" class="custom-class"></arrow-right-icon>
                                <span class="add-to-cart">{{row.trans.view_product}}</span>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Products Ends -->
            </div>
        </div>
        <div class="sidebar-detached sidebar-left">
            <div class="sidebar"><!-- Ecommerce Sidebar Starts -->
                <div class="sidebar-shop">
                    <div class="card">
                        <div class="card-body">
                            <div class="multi-range-price">
                                <h6 class="filter-title mt-0">{{row.trans.price_range}}</h6>
                                <ul class="list-unstyled price-range" id="price-range">
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="priceAll" name="price-range" v-model="selected_price" value="all" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="priceAll">{{row.trans.all}}</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="priceRange1" name="price-range" v-model="selected_price" value="l-100" class="custom-control-input" />
                                            <label class="custom-control-label" for="priceRange1">&lt;= 100</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="priceRange2" name="price-range" v-model="selected_price" value="f-100-t-500" class="custom-control-input" />
                                            <label class="custom-control-label" for="priceRange2">100 - 500</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="priceARange3" name="price-range" v-model="selected_price" value="f-500-t-1000" class="custom-control-input" />
                                            <label class="custom-control-label" for="priceARange3">500 - 1000</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="priceRange4" name="price-range" v-model="selected_price" value="g-1000" class="custom-control-input" />
                                            <label class="custom-control-label" for="priceRange4">&gt;= 1000</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Price Filter ends -->

                            <!-- Categories Starts -->
                            <div id="product-categories">
                                <h6 class="filter-title">{{ row.trans.categories }}</h6>
                                <ul class="list-unstyled categories-list">
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="categoryAll" name="category-filter" v-model="selected_category" value="all" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="categoryAll">{{row.trans.all}}</label>
                                        </div>
                                    </li>
                                    <li v-for="(category , index) in row.categories" :key="index">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" :id="category.id" name="category-filter" v-model="selected_category" :value="category.id" class="custom-control-input" />
                                            <label class="custom-control-label" :for="category.id">{{category.title}}</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Categories Ends -->

                            <!-- Clear Filters Starts -->
                            <div id="clear-filters">
                                <button type="button" class="btn btn-block btn-primary" v-on:click="selected_category='all'; selected_price='all'">{{ row.trans.cancel }}</button>
                            </div>
                            <!-- Clear Filters Ends -->
                        </div>
                    </div>
                </div>
                <!-- Ecommerce Sidebar Ends -->

            </div>
        </div>
        <div  id="more_btn" class="btn btn-flat"
              v-on:click="handleScrolledToBottom">
            {{row.trans.more}}
        </div>
        <div v-observe-visibility="handleScrolledToBottom"></div>
    </div>
</template>

<script>
import {HeartIcon ,ArrowRightIcon } from 'vue-feather-icons'

    export default {

        data () {
            return {
                products:[],
                resultsCount:0,
                pagination:null,
                per_page :10,
                page:1,
                last_page:1,
                selected_price:'all',
                selected_category:'all',
                search_key:'',
                toastData:{
                    title:null,
                    message:null,
                    time:null
                },
            };
        },
        components: {
            HeartIcon,
            ArrowRightIcon
        },
        props: ['row'],

        created() {
        },
        mounted() {
            feather.replace();
            this.fetch();
        },
        watch: {
            selected_price: function(newVal, oldVal) {
                this.products.length=0;
                this.fetch();
            },
            selected_category: function(newVal, oldVal) {
                this.products.length=0;
                this.fetch();
            },
            search_key: function(newVal, oldVal) {
                this.products.length=0;
                this.fetch();
            },
        },
        methods:{
            async fetch () {
                let url = '/api/v1/products/get-filtered-products/'+ this.row.user.id+
                    '?page='+ this.page+'&per_page='+this.per_page+
                    '&selected_price='+this.selected_price+
                    '&selected_category='+this.selected_category+
                    '&search_key='+this.search_key;
                await axios.get(url).then(response => {
                    if (response.data.code === 200){
                        this.products.push(...response.data.data.data);
                        this.pagination =response.data.data.pagination
                        this.resultsCount = this.pagination.total
                        this.last_page = this.pagination.last_page
                    }else{
                        console.log( )
                        this.displayToast(response.data.message.title ,
                            response.data.message.message
                            , '');
                    }
                });
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
            handleScrolledToBottom(isVisible){
                if (!isVisible) { return }
                if (this.page >= this.last_page) { return }
                this.page++
                this.fetch()
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
            }
        }
    }


</script>
<style scoped>
#more_btn{
    width: 100%;
    background-color: #fff;
}
.list-products-img{
height: 300px;
    width: 300px;
}
</style>
