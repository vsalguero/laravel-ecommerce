{!! Form::open(['route'=> [$product->url(), $product->id],'method' => $product->method(),'class'=>'app-form']) !!}
<div>
    {!! Form::label('title','Product Name:') !!}
    {!! Form::text('title',$product->title,['class'=>'form-control']) !!}
</div>

<div>
    {!! Form::label('description','Description:') !!}
    {!! Form::textarea('description',$product->description,['class'=>'form-control']) !!}
</div>

<div>
    {!! Form::label('price','Price:') !!}
    {!! Form::number('price',$product->price,['class'=>'form-control']) !!}
</div>


<div>
    <br>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>


{!! Form::close() !!}