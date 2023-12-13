<!-- Materia Id -->
<br>
	<div class ="form-group col-md-13">
	{!! Form::label('materias_id', 'Seleccionar Materia:') !!}
     {!! Form::select('materias_id', $materias, null, ['class' => 'form-control custom-select','placeholder'=>'Seleccione']) !!}
	 </div>
	<br>

<!-- Espacio Id -->
<br>
	<div class ="form-group col-md-13">
	{!! Form::label('espacios_id', 'Seleccionar Ubicación de la Sala:') !!}
     {!! Form::select('espacios_id', $espacios, null, ['class' => 'form-control custom-select','placeholder'=>'Seleccione']) !!}
	 </div>
	<br>

    <div class ="form-group col-md-13">
	{!! Form::label('cursos_id', 'Seleccionar Curso:') !!}
     {!! Form::select('cursos_id', $cursos, null, ['class' => 'form-control custom-select','placeholder'=>'Seleccione']) !!}
	 </div>
	<br>
    <div class ="form-group col-md-13">
	{!! Form::label('carreras_id', 'Seleccionar Carrera:') !!}
     {!! Form::select('carreras_id', $carreras, null, ['class' => 'form-control custom-select','placeholder'=>'Seleccione']) !!}
	 </div>

<br>
<!-- Dia Semana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia_semana', 'Dia Semana:') !!}
    {!! Form::text('dia_semana', null, ['class' => 'form-control','id'=>'dia_semana']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#dia_semana').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: false
        })
    </script>
@endpush

<!-- Dia hora entrada -->

<div class="form-group col-sm-6">
    {!! Form::label('hora_entrada', 'Hora de Entrada:') !!}
    {!! Form::time('hora_entrada', \Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control','id'=>'hora_entrada']) !!}
</div>


@push('page_scripts')
    <script type="text/javascript">
        $('#hora_entrada').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
<!-- Dia hora salida -->
<div class="form-group col-sm-6">
    {!! Form::label('hora_salida', 'Hora de Salida:') !!}
    {!! Form::time('hora_salida', \Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control','id'=>'hora_salida']) !!}
</div>


@push('page_scripts')
    <script type="text/javascript">
        $('#hora_salida').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush


<!-- Periodo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo', 'Periodo:') !!}
    {!! Form::text('periodo', null, ['class' => 'form-control']) !!}
</div>