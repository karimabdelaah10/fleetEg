<template>
    <div class="form-group">
        <new-product-specs v-for="(item , index) in specsOuter"
                           :key="index"
                           :row="row"
        ></new-product-specs>
        <a v-on:click="pushNewSpec">
            {{ row.trans.add_spec }}
            <span>
              <i data-feather="plus"></i>
          </span>
        </a>
    </div>
</template>

<script>
    export default {
        data () {
            return {
             'specsOuter':[],
            };
        },
        props: ['row'],

        created() {
        },
        methods:{
            pushNewSpec:function (){
                this.specsOuter.push({'name':''});
            }
        }
    }
</script>
