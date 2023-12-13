<!-- Campo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campo', 'Campo:') !!}
    {!! Form::text('campo', null, ['class' => 'form-control']) !!}
</div>

<!-- Antiguo Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('antiguo_valor', 'Antiguo Valor:') !!}
    {!! Form::text('antiguo_valor', null, ['class' => 'form-control']) !!}
</div>

<!-- Nuevo Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nuevo_valor', 'Nuevo Valor:') !!}
    {!! Form::text('nuevo_valor', null, ['class' => 'form-control']) !!}
</div>