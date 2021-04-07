<template>
    <div>
        <div class="form-group">
            <div class="custom-control custom-control-primary custom-switch">
                <label class="form-label"
                       for="discount">
                    {{ row.trans.discount}}
                </label>
                <input type="checkbox"
                       name="discount"
                       :checked="flag"
                       v-on:click="toggelDiscountSwitcher"
                       class="custom-control-input"
                       id="discount">
                <label class="custom-control-label" for="discount"></label>
            </div>

        </div>
        <div  v-if="flag">
            <div class="form-group">
                <label for="two_pc_discount" class="form-label">
                    {{ row.trans.on_two_pc_discount}}
                <span class="text-danger">* </span>
                </label>
                <input id="two_pc_discount" label=" two_pc_discount" :placeholder="row.trans.on_two_pc_discount"  required="required"
                       v-model="on_two_pc_discount" name="two_pc_discount" type="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="plus_two_pc_discount" class="form-label">
                    {{ row.trans.plus_two_pc_discount}}
                    <span class="text-danger">* </span>
                </label>
                <input id="plus_two_pc_discount" label="plus_two_pc_discount" :placeholder="row.trans.plus_two_pc_discount"  required="required"
                       v-model="plus_two_pc_discount" name="plus_two_pc_discount"
                       type="number" class="form-control">
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data () {
            return {
            'plus_two_pc_discount':0,
            'on_two_pc_discount':0,
            'flag':0
            };
        },  props: ['row'],

        created() {
            if (this.row.discount){
                this.flag =1;
                this.on_two_pc_discount = this.row.two_pc_discount;
                this.plus_two_pc_discount = this.row.plus_two_pc_discount;
            }
        },
        methods:{
            toggelDiscountSwitcher:function (){
                this.flag=!this.flag;
            }
        }
    }
</script>
