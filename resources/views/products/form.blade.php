{!! Form::open(array('url' => $url, 'method' => $method)) !!}
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="">Nombre</label>
                {{ Form::text('name',$product->name,['class'=>'form-control','value'=>'223']) }}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
            <div class="form-group{{ $errors->has('code') ? 'has-error' : '' }}">
                <label for="">Código</label>
                {{ Form::text('code',$product->code,['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('code')}}</small>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group{{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="">Descripción</label>
                {{ Form::textarea('description',$product->description,['class'=>'form-control','size' => '30x5'])}}
                <small class="text-danger">{{ $errors->first('description')}}</small>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group{{ $errors->has('price') ? 'has-error' : ''}}">
                <label for="">Precio</label>
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::number('price',$product->price,['class'=>'form-control'])}}
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('price')}}</small>
            </div>
            <div class="form-group{{ $errors->has('quantity') ? 'has-error' : ''}}">
                <label for="">Cantidad</label>
                {{ Form::number('quantity',$product->quantity,['class'=>'form-control'])}}
                <small class="text-danger">{{ $errors->first('quantity')}}</small>
            </div>
        </div>
    </div>
    <div class="row panel-footer">
        <div class="col-md-12 text-right">
            <div class="form-group">
                <input type="submit" value="Enviar" class="btn btn-default">
            </div>
        </div>
    </div>
{!! Form::close() !!}
