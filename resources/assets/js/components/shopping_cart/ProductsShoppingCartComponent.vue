<template>
<div>
<material-transition-group tag="div"
    <article class="card-product" :key="product.id" :data-index="index" v-for="(product, index) in products">
        <div class="row">
            <div class="col-10">
                <strong>{{ product.title }}</strong>
                
            </div>
            <div class="col-2">
                <strong>{{ product.humanPrice }}</strong>                
            </div>
        </div>
    </article>
    <article class="total card-product">
    <div class="row">
            <div class="col-10">
                <strong>Total</strong>
                
            </div>
            <div class="col-2">
                <strong>{{ total }}</strong>                
            </div>
        </div>
    </article>
</material-transition-group>
  </div>  
</template>
<script>
export default {
    data() {
        return {
            endpoint : '/carrito/products',
            products : []
        }
        
    },
    created(){
         this.fetchProducts();
    },
    computed: {
        total(){
            let cents = this.products.reduce((a,b) => {
                return a + b.numberPrice
            },0);

            return  `$${cents/100}`;
        }
    },
    methods:{
        fetchProducts(){
            axios.get(this.endpoint).then(response => {
                this.products = response.data.data;
            })
        }
    }
}
</script>