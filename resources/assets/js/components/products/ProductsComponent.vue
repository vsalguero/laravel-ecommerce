<template lang="html">
<section>
  <div class="row">
<transition-group 
tag="div"
:css="false"
name="fadeIn"
@before-enter="beforeEnter"
@enter="enter"
@leave="leave"
class="row"
    <product-card-component v-bind:product="product" :data-index="index" :key="product.id" v-for="(product, index) in products"></product-card-component>
</transition-group>
</transition-group>
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
     beforeEnter(el){
       el.style.opacity = 0;
       el.style.transform = "scale(0)";
       el.style.transition = "all 0.2s cubic-bezier(0.4,0.0,0.2,1)"
     },
     enter(el){
       const delay = 200 * el.dataset.index;
       setTimeout(()=>{

         el.style.opacity = 1;
       el.style.transform = "scale(1)";
       },delay);
     },
     leave(el){
       el.style.opacity = 0;
       el.style.transform = "scale(0)";
     }
   }
}
</script>
    <style lang="css">

</style>