<div class="table-responsive">
    <table class="table" id="materiaEspacios-table">
        <thead>
        <tr>
            <th>Dia Semana</th>
            <th>Hora Entrada</th>
            <th>Hora Salida</th>
            <th>Periodo</th>
            <th>Materia</th>
            <th>Sala</th>
            <th>Curso</th>
            <th>Carrera</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($materiaEspacios as $materiaEspacio)
            <tr>
                <td>{{ $materiaEspacio->dia_semana }}</td>
                <td>{{ $materiaEspacio->hora_entrada }}</td>
                <td>{{ $materiaEspacio->hora_salida }}</td>
                <td>{{ $materiaEspacio->periodo }}</td>
                <td>{{ $materiaEspacio->materia->nombreMat }}</td>
                <td>{{ $materiaEspacio->espacio->salaEsp . ' - ' . $materiaEspacio->espacio->sectorEsp . '   ' . $materiaEspacio->espacio->edificioEsp }}</td>
                <td>{{ $materiaEspacio->curso->nombreCur }}</td>
                <td>{{ $materiaEspacio->carrera->nombreCarr }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['materiaEspacios.destroy', $materiaEspacio->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('materiaEspacios.show', [$materiaEspacio->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>

                        @canany(['edit_materia_espacio', 'delete_materia_espacio'])
                        <a href="{{ route('materiaEspacios.edit', [$materiaEspacio->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        @endcanany

                        @can('delete_materia_espacio')
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

