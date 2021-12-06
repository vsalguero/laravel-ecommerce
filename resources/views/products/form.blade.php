{!! Form::open(['url'=> '/products','class'=>'app-form']) !!}
<div>
    {!! Form::label('title','Product Name:') !!}
    {!! Form::text('title','',['class'=>'form-control']) !!}
</div>

<div>
    {!! Form::label('description','Description:') !!}
    {!! Form::textarea('description','',['class'=>'form-control']) !!}
</div>

<div>
    {!! Form::label('price','Price:') !!}
    {!! Form::number('price',0,['class'=>'form-control']) !!}
</div>


<div>
    <br>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>


{!! Form::close() !!}