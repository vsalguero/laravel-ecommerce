<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductInShoppingCart;

class ProductInShoppingCartsController extends Controller
{
    //
    public function __construct(){
        $this->middleware("shopping_cart");

    }
    public function store(Request $request){
        //$request->shopping_cart;
        $in_shopping_cart = ProductInShoppingCart::create([
            'shopping_cart_id' => $request->shopping_cart->id,
            'product_id' => $request->product_id
        ]);

        if($in_shopping_cart){
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['product' => 'No se puede agregar el producto']);
        }

    }
    public function destroy($id){
        
    }
}
