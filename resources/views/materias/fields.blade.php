<!-- Nombremat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombreMat', 'Materia:') !!}
    {!! Form::text('nombreMat', null, ['class' => 'form-control']) !!} 
</div>
<div class="form-group col-sm-6">
    {!! Form::label('cantidadAlu', 'Cantidad de Alumnos:') !!}
    {!! Form::number('cantidadAlu', null, ['class' => 'form-control']) !!} 
</div>

<!-- Seleccionar carrera -->
<div class="form-group col-md-6 col-sm-12">
    {!! Form::label('carreras_id', 'Seleccionar Carrera:') !!}
    <?php
        $carreras = App\Models\Carrera::when(!auth()->user()->hasRole('super_admin'), function ($query) {
            $query->where('facultades_id', auth()->user()->facultades_id);
        })->pluck('nombreCarr', 'id');
    ?>
    {!! Form::select('carreras_id', $carreras, null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione']) !!}
</div>
