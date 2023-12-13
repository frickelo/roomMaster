<!-- Nombrecur Field -->
<div class="col-sm-12">
    {!! Form::label('nombreCur', 'Curso:') !!}
    <p>{{ $curso->nombreCur }}</p>
</div>
 
<!-- Carrera Id Field -->

<div class="col-sm-12">
    {!! Form::label('carreras_id', 'Carrera:') !!}
    <p>{{ $curso->carrera->nombreCarr }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $curso->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $curso->updated_at }}</p>
</div>

