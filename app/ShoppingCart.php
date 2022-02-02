<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    public static function findOrCreateById($shopping_card_id){
        if($shopping_card_id){
            return ShoppingCart::find($shopping_card_id);
        }else{
            return ShoppingCart::create();
        }
    }

    public function products(){
        return $this->belongsToMany('App\Product','product_in_shopping_carts');
    }

    public function productsCount(){
        return $this->products->count();
    }

    public function amount(){
        return $this->products->sum("price") / 100;
    }
}
