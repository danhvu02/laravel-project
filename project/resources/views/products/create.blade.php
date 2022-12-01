@extends('layouts.public')
 
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Create a Product</div>

<div class="card-body">
    {!! Form::open(['route' => 'products.store', 'method' => 'post']) !!}
    
    {{ Form::label('category_id', 'Add Category ID') }}
    {{ Form::text('category_id', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

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
    {{ Form::text('picture', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

    {{ Form::submit('Add Product', ['class'=> 'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px'])}}
    {!! Form::close() !!}
</div>