@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="clearfix">
            <span class="panel-title">Crear Producto</span>
            <a href="{{route('products.index')}}" class="btn btn-primary pull-right">Regresar</a>
        </div>
    </div>
    <div class="panel-body">
        @include('products.form',['product'=> $product, 'url' => 'products', 'method' => 'POST'])
    </div>
</div>
@endsection
