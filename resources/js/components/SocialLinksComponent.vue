<template>
    <div>
        <div class="list-group list-group-labels">
           <div  class="d-md-block">

            <a target="_blank" :href="facebook_url" class="float-right btn-social-icon">
                <i class="text-primary" data-feather='facebook' style="font-size: 10px"></i>
            </a>
            <a target="_blank" :href="youtube_url" class="float-right btn-social-icon">
                 <i class="text-danger" data-feather='youtube'></i>
            </a>
            <a target="_blank" :href="email" class="float-right btn-social-icon">
                <i class="text-muted" data-feather='mail'></i>
            </a>
            <a target="_blank" :href="mobile_number" class="float-right btn-social-icon">
                <i class="text-muted" data-feather="phone"></i>
            </a>
            <a target="_blank" :href="whatsapp_number" class="float-right ">
                <img src="/images/whatsapp.png" class="whatsapp_image"/>
            </a>
            <a target="_blank" :href="messenger_url" class="float-right btn-social-icon">
                <message-circle-icon size="1.5x" class="custom-class"></message-circle-icon>
            </a>
        </div>
        </div>
    </div>
</template>

<script>
  import { MessageCircleIcon } from 'vue-feather-icons'

    export default {

        data () {
            return {
                'facebook_url':null,
                'youtube_url':null,
                'email':null,
                'mobile_number':null,
                'whatsapp_number':null,
                'messenger_url':null,
            };
        },
        components: {
            MessageCircleIcon
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
                        if (response.data.code === 200){
                            this.facebook_url = response.data.data.facebook_url;
                            this.youtube_url = response.data.data.youtube_url;
                            this.email = 'mailto:'+response.data.data.email;
                            this.mobile_number = 'tel:'+response.data.data.mobile_number;
                            this.whatsapp_number = 'https://wa.me/'+response.data.data.whatsapp_number;
                            this.messenger_url = 'https://m.me/'+response.data.data.messenger_url;
                        }
                        else{
                            alert(response.data.message);console.log(response.data.message)
                        }
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
