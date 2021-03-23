<template>
    <div>
        <div class="list-group list-group-labels">
            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-warning mr-1"></span>
                {{trans.pending}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                    {{pending}}
                </span>
            </a>
            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-primary  mr-1"></span>
                {{trans.under_review}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                {{ under_review }}
                </span>
            </a>
            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-danger mr-1"></span>
                {{trans.in_stock}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                {{in_stock}}
                </span>
            </a>
            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-info mr-1"></span>
                {{trans.with_shipping_company}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                {{with_shipping_company}}
                </span>
            </a>
            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-success mr-1"></span>
                {{trans.delivered}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                {{delivered}}
                </span>

            </a>
        </div>
    </div>
</template>

<script>
    export default {

        data () {
            return {
                in_stock:0,
                with_shipping_company:0,
                delivered:0,
                pending:0,
                under_review:0,
                trans:[],

            };
        },
        props: ['user'],

        created() {
        },
        mounted() {
                this.getOrdersNumbers();

        },
        methods:{
            getOrdersNumbers(){
                axios.get('/api/v1/carts/orders_number/'+this.user.id)
                    .then((response)=> {
                             this.in_stock = response.data.data.in_stock;
                             this.under_review = response.data.data.under_review;
                             this.pending = response.data.data.pending;
                             this.delivered = response.data.data.delivered;
                             this.with_shipping_company = response.data.data.with_shipping_company;
                             this.trans = response.data.trans;
                    });
            }
        }
    }


</script>
<style scoped>

.whatsapp_image{
    height: 20px;
    width: 20px;
    margin-bottom: 1px;
}
.btn-social-icon>svg{
    height: 1.4285rem;
    width: 1.4285rem;
    font-size: 1.45rem;
    margin-left: 1.1rem;
    -webkit-flex-shrink: 0;
    -ms-flex-negative: 0;
    flex-shrink: 0;
}
</style>
