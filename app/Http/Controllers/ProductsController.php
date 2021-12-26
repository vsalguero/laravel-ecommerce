<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ShoppingCart;
use App\Http\Resources\ProductsCollection;

class ProductsController extends Controller
{
    public function __constructor(){
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Muestra una colección de los productos
        $products = Product::paginate(15);

        if($request->wantsJson()){
            return new ProductsCollection($products);
        }

        return view('products.index', ['products' => $products]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Muestra el diseño de un formulario para crear un registro
        $product = new Product();
        return view('products.create', ["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Almacena los datos en la base de datos
        $options = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
            //'image_url' => $request->image_url
        ];
        if(Product::create($options)){
          return redirect('/products');
        }else{
            return view('products.create'   );

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Muestra un solo registro
        $product = Product::find($id);

        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Muestra un formulario para editar un registro
        $product = Product::find($id);
        return view('products.edit', ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Acción para actualizar un registro
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;

        if($product->save()){
            return redirect('/products');
        }else{
            return view('products.edit', ["product" => $product]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar un registro especificado
        Product::destroy($id);
        return redirect('/products');
    }
}
