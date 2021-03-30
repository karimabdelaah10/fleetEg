<template>
    <div  class="form-group">
        <div class="row mg-t-20 mb-1">
            <label class="col-sm-! form-control-label">
                {{ row.trans.specs}}
                <span class="tx-danger">*
                </span></label>
            <div class="col-sm-11 mg-t-10 mg-sm-t-0">
                <select class="form-control" name="specs[]" v-model="SpecId">
                    <option selected disabled>
                        {{row.trans.select_specs}}</option>
                    <option v-for="spec in specs"
                            :key="spec.id"
                            v-bind:value="spec.id">{{ spec.title }}</option>
                </select>
            </div>
        </div>
<!--        <specs-values-->
<!--            v-for="values in specValuesList"-->
<!--            :key="values.name"-->
<!--            :row="row"-->
<!--            :spec_id="SpecId"></specs-values>-->
<!--        <a v-on:click="pushNewValue">-->
<!--            {{ row.trans.add_spec_value }}-->

<!--            <span>-->
<!--              <i data-feather="plus"></i>-->
<!--          </span>-->
<!--        </a>-->
        <hr>

    </div>
</template>

<script>
    export default {

        data () {
            return {
                specs :[],
                specValuesList:[{'name':''}],
                SpecId:null
            };
        },
        props: ['row'],

        created() {
            this.getSpecs();
        },
        methods:{
            getSpecs(){
                axios.get('/api/v1/specs')
                    .then((response)=>{
                        if (response.data.code === 200){
                            this.specs = response.data.data;
                        }
                        else{
                            alert(response.data.message)
                        }
                    })
            },
            pushNewValue:function (){
                this.specValuesList.push({'name':''});
            }
        }
    }
</script>
