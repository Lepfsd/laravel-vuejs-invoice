@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="clearfix">
            <span class="span-title">Producto</span>
            <div class="pull-right">
                <a href="{{route('products.index')}}" class="btn btn-primary">Regresar</a>
                <a href="{{route('products.edit', $product)}}" class="btn btn-warning">Editar</a>
                <form class="form-inline" method="post"
                                    action="{{route('products.destroy', $product)}}"
                                    onsubmit="return confirm('Ud está seguro?')"
                                >
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <p>{{$product->name}}</p>

                </div>
                <div class="form-group">
                    <label for="">Cóodigo</label>
                    <p>{{$product->code}}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <label for="">Descripción</label>
                <p>{{$product->description}}</p>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Precio</label>
                    <p>{{$product->price}}</p>
                </div>
                <div class="form-group">
                    <label for="">Cantidad</label>
                    <p>{{$product->quantity}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
