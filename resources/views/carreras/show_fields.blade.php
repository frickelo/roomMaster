<!-- Nombrecarr Field -->
<div class="col-sm-12">
    {!! Form::label('nombreCarr', 'Carrera:') !!}
    <p>{{ $carrera->nombreCarr }}</p>
</div>

<!-- Especie Id Field -->
<div class="col-sm-12">
    {!! Form::label('facultades_id', 'Facultad:') !!}
    <p>{{ $carrera->facultad->nombreFacu }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $carrera->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $carrera->updated_at }}</p>
</div>

