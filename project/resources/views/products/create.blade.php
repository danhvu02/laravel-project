@extends('layouts.public')
 
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Create a Product</div>

<div class="card-body">
    {!! Form::open(['route' => 'products.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
    
    {{ Form::label('category_id', 'Add Category ID') }}
    <select name="category_id" class="form-control" id="product" >
        <option selected value="">Choose...</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->id }}</option>
        @endforeach
    </select>

    {{ Form::label('title', 'Add Title') }}
    {{ Form::text('title', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

    {{ Form::label('description', 'Add Description') }}
    {{ Form::text('description', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

    {{ Form::label('price', 'Add Price') }}
    {{ Form::text('price', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

    {{ Form::label('quantity', 'Add Quantity') }}
    {{ Form::text('quantity', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

    {{ Form::label('sku', 'Add Sku') }}
    {{ Form::text('sku', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

    {{ Form::label('picture', 'Add Picture') }}
    {{ Form::file('picture', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

    {{ Form::submit('Add Product', ['class'=> 'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px'])}}
    {!! Form::close() !!}
</div>

</div>
</div>
</div>
</div>
@endsection

@section('scripts')
@endsection

@section('css')
@endsection