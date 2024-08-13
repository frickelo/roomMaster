<div class="table-responsive">
    <table class="table" id="materias-table">
        <thead>
        <tr>
            <th>Nombre de la materia</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($materias as $materia)
            <tr>
                <td>{{ $materia->nombreMat }}</td>
                <td>{{ $materia->cantidadAlu }}</td>
                <td>{{ $materia->carrera->nombreCarr}}</td> 

                <td width="120">
                    {!! Form::open(['route' => ['materias.destroy', $materia->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('materias.show', [$materia->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('materias.edit', [$materia->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
