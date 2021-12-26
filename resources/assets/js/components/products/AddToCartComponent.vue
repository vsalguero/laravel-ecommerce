<template lang="html">
    <button @click="addToCart" class="btn btn-primary">{{ message }}</button>
</template>

<script>import Axios from "axios"

export default{
    data(){
        return {
            message: 'Agregar al carrito',
            endpoint: '/in_shopping_carts'
        }
        
    },
    props: {product: {type: Object}},
    methods:{
        addToCart(){
            axios({
                method: 'POST',
                url: this.endpoint,
                data: {
                    product_id : this.product.id
                },
                headers: {
                    "Accept":"Application/json",
                    "Content-Type": "Application/json"
                }
            }).then(()=>{
               console.log('Se agrego el producto');
            });

        }

    }
}
</script>