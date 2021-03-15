<template>
    <div>
        <div class="content-detached content-right">
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
                            <h6 class="item-name">
                                <a class="text-body" href="one-product.html">{{item.title}}</a>
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
                            <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
                                <i data-feather="heart"></i>
                                <span>{{ row.trans.add_to_wish_list }}</span>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-primary btn-cart">
                                <i data-feather="shopping-cart"></i>
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
                                            <input type="radio" id="priceAll" name="price-range" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="priceAll">{{row.trans.all}}</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="priceRange1" name="price-range" class="custom-control-input" />
                                            <label class="custom-control-label" for="priceRange1">&lt;=$10</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="priceRange2" name="price-range" class="custom-control-input" />
                                            <label class="custom-control-label" for="priceRange2">$10 - $100</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="priceARange3" name="price-range" class="custom-control-input" />
                                            <label class="custom-control-label" for="priceARange3">$100 - $500</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="priceRange4" name="price-range" class="custom-control-input" />
                                            <label class="custom-control-label" for="priceRange4">&gt;= $500</label>
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
                                            <input type="radio" id="categoryAll" name="category-filter" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="priceAll">{{row.trans.all}}</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="category1" name="category-filter" class="custom-control-input" />
                                            <label class="custom-control-label" for="category1">Appliances</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="category2" name="category-filter" class="custom-control-input" />
                                            <label class="custom-control-label" for="category2">Audio</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="category3" name="category-filter" class="custom-control-input" />
                                            <label class="custom-control-label" for="category3">Cameras & Camcorders</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="category4" name="category-filter" class="custom-control-input" />
                                            <label class="custom-control-label" for="category4">Car Electronics & GPS</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="category5" name="category-filter" class="custom-control-input" />
                                            <label class="custom-control-label" for="category5">Cell Phones</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="category6" name="category-filter" class="custom-control-input" />
                                            <label class="custom-control-label" for="category6">Computers & Tablets</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="category7" name="category-filter" class="custom-control-input" />
                                            <label class="custom-control-label" for="category7">Health, Fitness & Beauty</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="category8" name="category-filter" class="custom-control-input" />
                                            <label class="custom-control-label" for="category8">Office & School Supplies</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="category9" name="category-filter" class="custom-control-input" />
                                            <label class="custom-control-label" for="category9">TV & Home Theater</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="category10" name="category-filter" class="custom-control-input" />
                                            <label class="custom-control-label" for="category10">Video Games</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Categories Ends -->

                            <!-- Clear Filters Starts -->
                            <div id="clear-filters">
                                <button type="button" class="btn btn-block btn-primary">{{ row.trans.cancel }}</button>
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
    export default {

        data () {
            return {
                products:[],
                resultsCount:0,
                pagination:null,
                per_page :1,
                page:1,
                last_page:1,

            };
        },
        props: ['row'],

        created() {
        },
        mounted() {},
        beforeMount() {
            this.fetch();
        },
        methods:{
            async fetch () {
               await axios.get('/api/v1/products/?page='+this.page+'&per_page='+this.per_page)
                        .then(response => {
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
            }
        }
    }


</script>
<style scoped>
#more_btn{
    width: 100%;
    background-color: #fff;
}
</style>
