<div class="container">
    <div class="row">
        <!-- Materia Id -->
        <div class="form-group col-md-6 col-sm-12">
            {!! Form::label('materias_id', 'Seleccionar Materia:') !!}
            <?php
                $materias = App\Models\Materia::when(!auth()->user()->hasRole('super_admin'), function ($query) {
                    $query->whereHas('carrera', function ($query) {
                        $query->where('facultades_id', auth()->user()->facultades_id);
                    });
                })->get()->pluck('nombreMat', 'id')->map(function($nombre, $id) {
                    $materia = App\Models\Materia::find($id);
                    return $nombre . ' - ' . $materia->carrera->nombreCarr;
                });
            ?>
            {!! Form::select('materias_id', $materias, null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione', 'id' => 'materiasSelect']) !!}
        </div>

        <!-- Curso Id -->
        <div class="form-group col-md-6 col-sm-12">
            {!! Form::label('cursos_id', 'Seleccionar Curso:') !!}
            <?php
                $cursos = App\Models\Curso::when(!auth()->user()->hasRole('super_admin'), function ($query) {
                    $query->whereHas('carrera', function ($query) {
                        $query->where('facultades_id', auth()->user()->facultades_id);
                    });
                })->get()->pluck('nombreCur', 'id')->map(function($nombre, $id) {
                    $curso = App\Models\Curso::find($id);
                    return $nombre . ' - ' . $curso->carrera->nombreCarr;
                });
            ?>
            {!! Form::select('cursos_id', $cursos, null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione']) !!}
        </div>
    </div>

    <div class="row">
        <!-- Carrera Id -->
        <div class="form-group col-md-6 col-sm-12">
            {!! Form::label('carreras_id', 'Seleccionar Carrera:') !!}
            <?php
                $carreras = App\Models\Carrera::when(!auth()->user()->hasRole('super_admin'), function ($query) {
                    $query->where('facultades_id', auth()->user()->facultades_id);
                })->pluck('nombreCarr', 'id');
            ?>
            {!! Form::select('carreras_id', $carreras, null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione']) !!}
        </div>

        <!-- Dia Semana Field -->
        <div class="form-group col-md-6 col-sm-12">
            {!! Form::label('dia_semana', 'Dia Semana:') !!}
            {!! Form::date('dia_semana', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control', 'id' => 'dia_semana']) !!}
        </div>
    </div>

    <div class="row">
        <!-- Hora Entrada -->
        <div class="form-group col-md-6 col-sm-12">
            {!! Form::label('hora_entrada', 'Hora de Entrada:') !!}
            {!! Form::time('hora_entrada', \Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control', 'id' => 'hora_entrada']) !!}
        </div>

        <!-- Hora Salida -->
        <div class="form-group col-md-6 col-sm-12">
            {!! Form::label('hora_salida', 'Hora de Salida:') !!}
            {!! Form::time('hora_salida', \Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control', 'id' => 'hora_salida']) !!}
        </div>
    </div>

    <div class="row">
        <!-- Espacio Id -->
        <div class="form-group col-md-6 col-sm-12">
            {!! Form::label('espacios_id', 'Seleccionar Ubicación de la Sala:') !!}
            {!! Form::select('espacios_id', [], null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione', 'id' => 'espaciosSelect']) !!}
        </div>

        <!-- Periodo Field -->
        <div class="form-group col-md-6 col-sm-12">
            {!! Form::label('periodo', 'Periodo:') !!}
            {!! Form::text('periodo', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


@push('page_scripts')
<script type="text/javascript">
    $(function () {
        $('#dia_semana').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            sideBySide: false
        });

        $('#hora_entrada').datetimepicker({
            format: 'HH:mm',
            useCurrent: false,
            sideBySide: false
        });

        $('#hora_salida').datetimepicker({
            format: 'HH:mm',
            useCurrent: false,
            sideBySide: false
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const materiasSelect = document.getElementById('materiasSelect');
        const espaciosSelect = document.getElementById('espaciosSelect');
        const diaSemanaInput = document.getElementById('dia_semana');
        const horaEntradaInput = document.getElementById('hora_entrada');
        const horaSalidaInput = document.getElementById('hora_salida');

        function loadEspacios() {
            const materiaId = materiasSelect.value;
            const diaSemana = diaSemanaInput.value;
            const horaEntrada = horaEntradaInput.value;
            const horaSalida = horaSalidaInput.value;

            // Verificar que todos los campos estén completos antes de hacer la solicitud
            if (!materiaId || !diaSemana || !horaEntrada || !horaSalida) {
                return; // No realizar la solicitud si falta algún campo
            }

            espaciosSelect.innerHTML = '<option value="">Seleccione</option>';

            let url = `/get-espacios/${materiaId}?dia_semana=${diaSemana}&hora_entrada=${horaEntrada}&hora_salida=${horaSalida}`;
            console.log('Fetching URL:', url);

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }
                    return response.json();
                })
                .then(espacios => {
                    console.log('Espacios recibidos:', espacios);
                    espacios.forEach(espacio => {
                        const option = document.createElement('option');
                        option.value = espacio.id;
                        option.textContent = `${espacio.edificioEsp} - ${espacio.sectorEsp} - ${espacio.salaEsp}`;
                        espaciosSelect.appendChild(option);
                    });

                    const selectedEspacioId = espaciosSelect.getAttribute('data-selected');
                    if (selectedEspacioId) {
                        espaciosSelect.value = selectedEspacioId;
                    }
                })
                .catch(error => {
                    console.error('Error al obtener los espacios:', error);
                    alert('Hubo un error al cargar los espacios. Por favor, inténtalo de nuevo.');
                });
        }

        function handleChange() {
            // Esperar un pequeño retraso para asegurarse de que todos los datos estén almacenados
            setTimeout(loadEspacios, 100);
        }

        materiasSelect.addEventListener('change', handleChange);
        diaSemanaInput.addEventListener('change', handleChange);
        horaEntradaInput.addEventListener('change', handleChange);
        horaSalidaInput.addEventListener('change', handleChange);

        if (materiasSelect.value) {
            loadEspacios();
        }
    });
</script>
@endpush
