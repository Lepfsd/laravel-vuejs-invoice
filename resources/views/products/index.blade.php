@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
            <div class="clearfix">
                <span class="panel-title">Productos</span>
                <a href="{{route('products.create')}}" class="btn btn-primary pull-right">Crear</a>
            </div>
        </div>
        <div class="panel-body">
            @if($products->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto No.</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th colspan="2">Creado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->created_at->diffForHumans()}}</td>
                        <td class="text-right">
                            <a href="{{route('products.show', $product)}}" class="btn btn-info btn-sm">View</a>
                            <a href="{{route('products.edit', $product)}}" class="btn btn-warning btn-sm">Edit</a>
                            <form class="form-inline" method="post"
                                    action="{{route('products.destroy', $product)}}"
                                    onsubmit="return confirm('Ud está seguro?')"
                                >
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $products->render() !!}
            @else
                <div class="invoice-empty">
                    <p class="invoice-empty-title">
                        No existen productos creados.
                        <a href="{{route('products.create')}}" class="btn btn-link">Crear ahora!</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
