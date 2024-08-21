<div class="table-responsive">
    <table class="table" id="carreras-table">
        <thead>
        <tr>
            <th>Carrera</th>
            <th>Facultad</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($carreras as $carrera)
            <tr>
                <td>{{ $carrera->nombreCarr }}</td>
                <td>{{ $carrera->facultad->nombreFacu }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['carreras.destroy', $carrera->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('carreras.show', [$carrera->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('carreras.edit', [$carrera->id]) }}"
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
