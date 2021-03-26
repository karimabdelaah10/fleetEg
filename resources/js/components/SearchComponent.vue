<template>
    <div >
        <li class="nav-item nav-search">
            <a class="nav-link nav-link-search">
                <i class="ficon" data-feather="search">

                </i>
            </a>
            <div class="search-input">
                <div class="search-input-icon">
                    <i data-feather="search"></i>
                </div>
                <input class="form-control input"
                       data-search="search"
                       placeholder=""
                       tabindex="-1"
                       type="text">
                <div class="search-input-close">
                    <i data-feather="x"></i>
                </div>
                <ul class="search-list search-list-main">
                    <li class="d-flex align-items-center"><a href="javascript:void(0)"><h6 class="section-label mt-75 mb-0">Pages</h6></a></li>
                </ul>
            </div>
        </li>

    </div>
</template>

<script>
    export default {
        props :['user'],
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
