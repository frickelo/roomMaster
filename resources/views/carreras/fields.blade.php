<!-- Nombrecarr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombreCarr', 'Carrera:') !!}
    {!! Form::text('nombreCarr', null, ['class' => 'form-control']) !!}
</div>

<br>
	<div class ="form-group col-md-13">
	{!! Form::label('facultades_id', 'Seleccionar facultad:') !!}
     {!! Form::select('facultades_id', $facultades, null, ['class' => 'form-control custom-select','placeholder'=>'Seleccione']) !!}
	 </div>
	<br>