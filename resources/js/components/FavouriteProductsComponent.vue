<template>
    <div>
        <div class="content-detached">
            <div class="content-body"><!-- E-commerce Content Section Starts -->
                <section id="ecommerce-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ecommerce-header-items">
                                <div class="result-toggler">
                                    <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                                        <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
                                    </button>
                                    <div class="search-results"> {{row.trans.results_found}} : {{resultsCount}}</div>
                                </div>
                                <div class="view-options d-flex">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn">
                                            <input type="radio" name="radio_options" id="radio_option1" checked />
                                            <i data-feather="grid" class="font-medium-3"></i>
                                        </label>
                                        <label class="btn btn-icon btn-outline-primary view-btn list-view-btn">
                                            <input type="radio" name="radio_options" id="radio_option2" />
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
                <section id="ecommerce-searchbar" class="ecommerce-searchbar">
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
                                    <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Search Bar Ends -->

                <!-- E-commerce Products Starts -->
                <section id="ecommerce-products" class="grid-view">
                    <div class="card ecommerce-card" v-for="(item , index) in products" :key="index">
                        <div class="item-img text-center">
                            <a href="one-product.html">
                                <img
                                    class="img-fluid card-img-top"
                                    :src="item.image"
                                    alt="img-placeholder"
                                /></a>
                        </div>
                        <div class="card-body">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <h6 class="item-price">
                                        <h6 class="item-price">@{{item.price}}</h6>
                                    </h6>
                                </div>
                                <div>
                                    <h6 class="item-price">${{item.price}}</h6>
                                </div>
                            </div>
                            <h4 class="item-name">
                                <a class="text-body" :href="'/customer-product/view/'+item.id">{{item.title}}</a>
                            </h4>
                            <h6 class="item-name">
                                <a class="text-body">{{item.category}}</a>
                            </h6>
                            <p class="card-text item-description">
                                {{item.description}}
                                </p>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-cost">
                                    <h4 class="item-price">${{item.price}}</h4>
                                </div>
                            </div>
                            <a v-on:click="toggleFavProduct(item.id ,item)"
                               v-if="!item.is_favourite"
                               class="btn btn-light btn-wishlist">
                                <heart-icon size="1.5x" fill="none" class="custom-class"></heart-icon>
                                <span>{{ row.trans.add_to_wish_list }}</span>
                            </a>
                            <a  v-on:click="toggleFavProduct(item.id , item)"
                                v-if="item.is_favourite"
                                class="btn btn-light btn-wishlist">
                                <heart-icon size="1.5x" fill="true" class="custom-class"></heart-icon>
                                <span>{{ row.trans.remove_from_wish_list }}</span>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-primary btn-cart">
                                <arrow-right-icon size="1.5x" class="custom-class"></arrow-right-icon>
                                <span class="add-to-cart">{{row.trans.view_product}}</span>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Products Ends -->
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
                search_key:'',
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
        },
        beforeMount() {
            this.fetch();

        },
        watch: {
            search_key: function(newVal, oldVal) {
                this.products.length=0;
                this.fetch();
            },
        },
        methods:{
            async fetch () {
                let url = '/api/v1/products/get-favourite-products/'+ this.row.user.id+'?page='+ this.page+'&per_page='+this.per_page+
                   '&search_key='+this.search_key;
               await axios.get(url).then(response => {
                            this.products.push(...response.data.data);
                            this.pagination =response.data.pagination
                            this.resultsCount = this.pagination.total
                            this.last_page = this.pagination.last_page
                        });
            },
            handleScrolledToBottom(isVisible){
                if (!isVisible) { return }
                if (this.page >= this.last_page) { return }
                this.page++
                this.fetch()
            },
           async toggleFavProduct(id ,item){
                let data = {
                    'product_id':id,
                    'user_id': this.row.user.id
                };
                await axios.post('/api/v1/products/fav' ,data)
                    .then(response => {
                        if (response.data.status === 200){
                            this.products.length =0;
                            this.fetch();
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
.favourite_product{

}
</style>
