@auth
{!! Form::open(['method' => 'DELETE', 'route'=>['products.destroy', $product->id], 'onsubmit' =>
'return confirm("Are you sure?")']) !!}
<button type="submit" class="btn btn-danger">Eliminar producto</button>

{!! Form::close() !!}    
@endauth
