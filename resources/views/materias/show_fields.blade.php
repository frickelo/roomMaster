<!-- Nombremat Field -->
<div class="col-sm-12">
    {!! Form::label('nombreMat', 'Nombremat:') !!}
    <p>{{ $materia->nombreMat }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('cursos_id', 'Curso:') !!}
    <p>{{ $materia->curso->nombreCur }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $materia->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $materia->updated_at }}</p>
</div>

