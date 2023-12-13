<!-- Nombremat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombreMat', 'Materia:') !!}
    {!! Form::text('nombreMat', null, ['class' => 'form-control']) !!}
</div>
<br>
	<div class ="form-group col-md-13">
	{!! Form::label('cursos_id', 'Seleccionar Curso:') !!}
     {!! Form::select('cursos_id', $cursos, null, ['class' => 'form-control custom-select','placeholder'=>'Seleccione']) !!}
	 </div>
	<br>