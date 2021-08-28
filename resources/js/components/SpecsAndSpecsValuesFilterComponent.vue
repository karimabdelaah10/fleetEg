<template>
    <div >
        <div class="row mg-t-20 mb-1">
            <label class="col-sm-! form-control-label">
                {{row.trans.specs}}
                <span class="text-danger">*</span>
            </label>
            <div class="col-sm-11 mg-t-10 mg-sm-t-0">
                <select class="form-control" v-model="spec_id" required v-on:change="getSpecsValues">
                    <option selected disabled value="null">{{row.trans.specs}}</option>
                    <option v-for="(spec , index) in specs" :key="index" :value="spec.id">{{spec.title}}</option>
                </select>
            </div>
        </div>
        <div class="row mg-t-20 mb-1" v-if="specs_values.length">
            <label class="col-sm-! form-control-label">
                {{row.trans.specs_values}}
                <span class="text-danger">*</span>
            </label>
            <div class="col-sm-11 mg-t-10 mg-sm-t-0" >
                <select class="form-control" name="spec_value_id" required>
                    <option selected disabled>{{row.trans.specs_values}}</option>
                    <option v-for="(value , index) in specs_values" :key="index" :value="value.id">{{value.title}}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                specs_values:[],
                spec_id:null
            }
        },
        props:[
            'row',
            'specs'
        ],
        mounted() {},
        methods:{
          async getSpecsValues(){
              axios.get('/api/v1/specs/specs_values/'+this.spec_id)
                  .then((response)=>{
                      this.specs_values = response.data.data;
                  });
          }
        }
    }
</script>
