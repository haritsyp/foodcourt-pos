<div class="form-group {{ $errors->has('nama_menu') ? 'has-error has-feedback' : '' }}">
    {!! Form::label('nama_menu', 'Menu :', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-3">
        <div class="input-group">
            {!! Form::text('nama_menu',null,['class'=>'form-control']) !!}
            {!! $errors->first('nama_menu', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error has-feedback' : '' }}">
    {!! Form::label('harga_menu', 'Price (IDR) :', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-3">
        <div class="input-group">
            {!! Form::number('harga_menu',null,['class'=>'form-control']) !!}
            {!! $errors->first('harga_menu', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
        </div>
    </div>
</div>