<template lang="html">
<section>
  <div class="row">
<material-transition-group tag="div" class="row"
    <product-card-component v-bind:product="product" :data-index="index" :key="product.id" v-for="(product, index) in products"></product-card-component>
</material-transition-group>
</div>
</section>
</template>


<script>
export default{
   data(){
     return{
       name: 'Products Component',
       products : [],
       endpoint: "/products"
     }
   },
   created() {
     this.fetchProducs();
   },
   methods: {
     fetchProducs(){
       axios.get(this.endpoint).then((response)=>{
         console.log(response.data.data);
         this.products = response.data.data;
       })
     },
     
   }
}
</script>
    <style lang="css">

</style>