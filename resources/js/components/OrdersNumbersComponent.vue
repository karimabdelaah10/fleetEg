<template>
    <div>
        <div class="list-group list-group-labels">
            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-warning mr-1"></span>
                {{trans.under_review}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                    {{ under_review }}
                </span>
            </a>
            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-dark  mr-1"></span>
                {{trans.with_shipping_company}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                {{with_shipping_company}}
                </span>
            </a>
            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-danger mr-1"></span>
                {{trans.no_answer}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                {{no_answer}}
                </span>
            </a>
            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-danger mr-1"></span>
                {{trans.not_serious}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                {{not_serious}}
                </span>
            </a>
            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-danger mr-1"></span>
                {{trans.refused}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                {{refused}}
                </span>
            </a>

            <a href="javascript:void(0)"
               class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="bullet bullet-sm bullet-warning mr-1"></span>
                {{trans.returned_to_stock}}
                <span class="badge badge-light-warning badge-pill ml-auto mr-1">
                {{returned_to_stock}}
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
                under_review:0,
                with_shipping_company:0,
                no_answer:0,
                not_serious:0,
                refused:0,
                returned_to_stock:0,
                delivered:0,
                toastData:{
                    title:null,
                    message:null,
                    time:null
                },
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
                        if (response.data.code === 200){
                            this.under_review = response.data.data.under_review;
                            this.with_shipping_company = response.data.data.with_shipping_company;
                            this.no_answer = response.data.data.no_answer;
                            this.not_serious = response.data.data.not_serious;
                            this.refused = response.data.data.refused;
                            this.returned_to_stock = response.data.data.returned_to_stock;
                            this.delivered = response.data.data.delivered;

                            this.trans = response.data.extra.trans;
                        }else{
                            alert(response.data.message)
                        }
                    });
            },
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
