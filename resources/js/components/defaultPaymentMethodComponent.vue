<template>
    <div>
        <star-icon size="1.5x"
                   v-on:click="updateDefaultMethod(row.id , $event)"
                   :fill="defaultFlag"
                   class="custom-class">

        </star-icon>
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
            console.log('row.default === '+this.row.default)
            if (this.row.default == 1){
                this.defaultFlag = 'true'
                console.log('defaultFlag === '+this.defaultFlag)
            }else {
                this.defaultFlag = 'none'
                console.log('defaultFlag === '+this.defaultFlag)
            }
        },
        methods:{
           async updateDefaultMethod(method_id , event){
                await axios.get('/api/v1/payment_methods/update_default/'+method_id)
                    .then((response)=>{
                        if (response.data.code === 200){
                            location.reload()
                            // $(".feather-star").attr('fill' ,'none')
                            // $(event.target).attr('fill' ,'true')
                        }
                        else{
                            alert(response.data.message);console.log(response.data.message)
                        }
                    })
            },
        }
    }
</script>
