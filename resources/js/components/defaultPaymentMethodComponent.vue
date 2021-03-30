<template>
    <div>
        <star-icon size="1.5x"  v-on:click="updateDefaultMethod(row.id , $event)" :fill="defaultFlag" class="custom-class"></star-icon>
    </div>

</template>

<script>
import { StarIcon } from 'vue-feather-icons'

    export default {

        data () {
            return {
                defaultFlag : 'none'

            };

        },
        components: {
            StarIcon
        },
        props: ['row'],

        created() {
            if (this.row.default){
                this.defaultFlag = true
            }
        },
        methods:{
           async updateDefaultMethod(method_id , event){
               $(".feather-star").attr('fill' ,'none')
                $(event.target).attr('fill' ,'true')
                await axios.get('/api/v1/payment_methods/update_default/'+method_id)
                    .then((response)=>{
                        if (response.data.code === 200){}
                        else{
                            alert(response.data.message)
                        }
                    })
            },
        }
    }
</script>
