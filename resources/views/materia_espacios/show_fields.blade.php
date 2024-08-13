<!-- Dia Semana Field -->
<div class="col-sm-12">
    {!! Form::label('dia_semana', 'Dia Semana:') !!}
    <p>{{ \Carbon\Carbon::parse($materiaEspacio->dia_semana)->format('Y-m-d') }}</p>
</div>

<!-- Hora Entrada Field -->
<div class="col-sm-12">
    {!! Form::label('hora_entrada', 'Hora Entrada:') !!}
    <p>{{ \Carbon\Carbon::parse($materiaEspacio->hora_entrada)->format('H:i') }}</p>
</div>

<!-- Hora Salida Field -->
<div class="col-sm-12">
    {!! Form::label('hora_salida', 'Hora Salida:') !!}
    <p>{{ \Carbon\Carbon::parse($materiaEspacio->hora_salida)->format('H:i') }}</p>
</div>

<!-- Periodo Field -->
<div class="col-sm-12">
    {!! Form::label('periodo', 'Periodo:') !!}
    <p>{{ $materiaEspacio->periodo }}</p>
</div>

<!-- Espacio - Sala y Sector Field -->
<div class="col-sm-12">
    {!! Form::label('sala_y_sector', 'Sala y Sector:') !!}
    <p>{{ $materiaEspacio->espacio->salaEsp . ' - ' . $materiaEspacio->espacio->sectorEsp }}</p>
</div>

<!-- Espacio - Edificio Field -->
<div class="col-sm-12">
    {!! Form::label('edificioEsp', 'Edificio:') !!}
    <p>{{ $materiaEspacio->espacio->edificioEsp }}</p>
</div>

<!-- Materia Field -->
<div class="col-sm-12">
    {!! Form::label('nombreMat', 'Materia:') !!}
    <p>{{ $materiaEspacio->materia->nombreMat }}</p>
</div>

<!-- Curso Field -->
<div class="col-sm-12">
    {!! Form::label('nombreCur', 'Curso:') !!}
    <p>{{ $materiaEspacio->curso->nombreCur }}</p>
</div>

<!-- Carrera Field -->
<div class="col-sm-12">
    {!! Form::label('carreras_id', 'Carrera:') !!}
    <p>{{ $materiaEspacio->carrera->nombreCarr }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $materiaEspacio->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $materiaEspacio->updated_at }}</p>
</div>
