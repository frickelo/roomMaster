<!-- Nombrecur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombreCur', 'Curso:') !!}
    {!! Form::text('nombreCur', null, ['class' => 'form-control']) !!}
</div>
<br>
	<div class ="form-group col-md-13">
	{!! Form::label('carreras_id', 'Seleccionar Carrera:') !!}
     {!! Form::select('carreras_id', $carreras, null, ['class' => 'form-control custom-select','placeholder'=>'Seleccione']) !!}
	 </div>
	<br>