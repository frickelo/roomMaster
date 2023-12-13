<div class="table-responsive">
    <table class="table" id="espacios-table">
        <thead>
        <tr>
            <th>Edificioesp</th>
        <th>Sectoresp</th>
        <th>Capacidadesp</th>
        <th>Salaesp</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($espacios as $espacio)
            <tr>
                <td>{{ $espacio->edificioEsp }}</td>
            <td>{{ $espacio->sectorEsp }}</td>
            <td>{{ $espacio->capacidadEsp }}</td>
            <td>{{ $espacio->salaEsp }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['espacios.destroy', $espacio->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('espacios.show', [$espacio->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('espacios.edit', [$espacio->id]) }}"
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
