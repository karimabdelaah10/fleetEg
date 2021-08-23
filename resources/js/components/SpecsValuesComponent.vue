<template>
    <div  class="form-group">
        <div class="row mg-t-20 ">
            <label class="col-sm-1 form-control-label">
                {{row.trans.specs_values}}
                <span class="tx-danger">*
                </span>
            </label>
            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                <select class="form-control"
                        v-model="selected"
                        :name="'selectedSpecsValues['+selected+'][spec]'"
                    >
                    <option disabled> اختر القيمة من هنا </option>
                    <option v-for="values in specsValues"
                            :key="values.id"
                            :value="values.id"
                    >
                        {{ values.title }}</option>
                </select>
            </div>
            <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                <div class="form-group">
                    <input id="amout"
                           :placeholder="row.trans.amount"
                           required="required"
                           :name="'selectedSpecsValues['+selected+'][amount]'"
                           type="number"
                           class="form-control col-sm-10">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                selected:null,
                selectedSpecsValues:[],
                specsValues:[],
            };
        },
        props:['row' ,'spec_id'],
        created() {
            alert(this.SelectedSpecId);
            console.log(this.SelectedSpecId);
            this.getSpecsValues(this.SelectedSpecId)
        },
        watch: {
            spec_id: function(newVal, oldVal) {
                this.SelectedSpecId =newVal;
                this.getSpecsValues(newVal);
            }
        },
        methods:{
            getSpecsValues(id){
                    axios.get('/api/v1/specs/specs_values/'+id)
                        .then((response)=>{
                            this.specsValues = response.data;
                });
            }
        }
    }
</script>
