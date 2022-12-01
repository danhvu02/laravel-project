@extends('layouts.public')
 
@section('content')
 @php

 @endphp
<div class="container">
 <div class="row justify-content-center">
 <div class="col-md-12">
 <div class="card">
 <div class="card-header">Products</div>
 
 <div class="card-body">
 @php

 @endphp
 <h1 class="pull-right"><a href='/products/create' class='btn btn-info' role='button'>+ Add New</a></h1>
 <table class="table">
 <thead>
 <th>#</th>
 <th>Category ID</th>
 <th>Title</th>
 <th>Description</th>
 <th>Price</th>
 <th>Quantity</th>
 <th>Sku</th>
 <th>Picture</th>
 <th></th>
 </thead>
 <tbody>
 @foreach ($products as $product)
 <tr>
 <td>{{ $product->id }}</td>
 <td>{{ $product->category_id }}</td>
 <td>{{ $product->title }}</td>
 <td>{{ $product->description }}</td>
 <td>{{ $product->price }}</td>
 <td>{{ $product->quantity }}</td>
 <td>{{ $product->sku }}</td>
 <td>{{ $product->picture }}</td>
 <td>
 <div style="float:left;"><a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm">Edit</a></div>
 <div style="float:left; margin-left:5px">

 {!! Form::open([
 'route'=> ['products.destroy', $product->id], 
 'method' => 'DELETE', 
 'onsubmit' => 'return confirm("Delete Product? Are you sure?")'
 ]) !!}
 {{ Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) }}
 {!! Form::close() !!}
 </div>
 
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 
 </div>
 </div>
 </div>
</div>
@endsection
 
@section('scripts')
<script type="text/javascript">
</script>
@endsection

@section('css')
<style>
 p {
 
 }
</style>
@endsection