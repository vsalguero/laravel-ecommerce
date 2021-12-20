<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    public static function findOrCreateById($shopping_card_id){
        if($shoppin_card_id){
            return ShoppingCard::find($shoppin_card_id);
        }else{
            return ShppingCard::create();
        }
    }
}
