@extends('layouts.public')
 
@section('content')
<div class="container">
 <div class="row justify-content-center">
 <div class="col-md-8">
 <div class="card">
 <div class="card-header">Edit Product</div>
 
 <div class="card-body">
 {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT']) !!}
 
 {{ Form::label('category_id', 'Category ID') }}
 {{ Form::text('category_id', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

 {{ Form::label('title', 'Title') }}
 {{ Form::text('title', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

 {{ Form::label('description', 'Description') }}
 {{ Form::text('description', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

 {{ Form::label('price', 'Price') }}
 {{ Form::text('price', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

 {{ Form::label('quantity', 'Quantity') }}
 {{ Form::text('quantity', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

 {{ Form::label('sku', 'Sku') }}
 {{ Form::text('sku', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

 {{ Form::label('picture', 'Picture') }}
 {{ Form::text('picture', null, ['class'=>'form-control', 'style'=>'', 'id'=>'product' ]) }}

 {{ Form::submit('Save Product', ['class'=> 'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px'])}}
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