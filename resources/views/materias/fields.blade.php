<!-- Nombremat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombreMat', 'Materia:') !!}
    {!! Form::text('nombreMat', null, ['class' => 'form-control']) !!} 
</div>
<div class="form-group col-sm-6">
    {!! Form::label('cantidadAlu', 'Cantidad de Alumnos:') !!}
    {!! Form::number('cantidadAlu', null, ['class' => 'form-control']) !!} 
</div>


<br>
	<div class ="form-group col-md-13">
	{!! Form::label('carreras_id', 'Seleccionar carrera:') !!}
     {!! Form::select('carreras_id', $carreras, null, ['class' => 'form-control custom-select','placeholder'=>'Seleccione']) !!}
	 </div>
	<br>