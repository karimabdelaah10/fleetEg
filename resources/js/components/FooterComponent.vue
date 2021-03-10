<template>

    <div>
        <div class="inline-block">
            <i data-feather="arrow-up"></i>
        </div>
        <p class="clearfix mb-0">
        <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT  &copy; 2020
      <span class="d-none d-sm-inline-block">, All rights Reserved</span>
        </span>
            <span
                class="float-md-right d-none d-md-block">
                <a target="_blank" :href="facebook_url">
                    <i class="text-primary" data-feather='facebook'></i>
                </a>
                <a target="_blank" :href="youtube_url">
            <i class="text-danger" data-feather='youtube'></i>
                </a>
                <a target="_blank" :href="email">
            <i class="text-muted" data-feather='mail'></i>
                </a>
                <a target="_blank" :href="mobile_number">
            <i class="text-muted" data-feather="phone"></i>
                </a>
                <a target="_blank" :href="whatsapp_number">
                    <img src="/images/whatsapp.png" class="whatsapp_image"/>
<!--                    <i class="text-muted" data-feather="whatsapp"></i>-->
                </a>

        </span>
        </p>

    </div>
</template>

<script>
    export default {

        data () {
            return {
                'facebook_url':null,
                'youtube_url':null,
                'email':null,
                'mobile_number':null,
                'whatsapp_number':null,
            };
        },
        props: [],

        created() {
        },
        mounted() {
                this.getSocialUrls();

        },
        methods:{
            getSocialUrls(){
                axios.get('/api/v1/configs/')
                    .then((response)=> {
                             this.facebook_url = response.data.facebook_url;
                             this.youtube_url = response.data.youtube_url;
                             this.email = 'mailto:'+response.data.email;
                             this.mobile_number = 'tel:'+response.data.mobile_number;
                             this.whatsapp_number = 'https://wa.me/'+response.data.whatsapp_number;

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
</style>
