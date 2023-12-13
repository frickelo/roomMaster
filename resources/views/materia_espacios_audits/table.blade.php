<div class="table-responsive">
    <table class="table" id="materiaEspaciosAudits-table">
        <thead>
        <tr>
            <th>Campo</th>
        <th>Antiguo Valor</th>
        <th>Nuevo Valor</th>
        <th>Fecha</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($materiaEspaciosAudits as $materiaEspaciosAudit)
            <tr>
                <td>{{ $materiaEspaciosAudit->campo }}</td>
            <td>{{ $materiaEspaciosAudit->antiguo_valor }}</td>
            <td>{{ $materiaEspaciosAudit->nuevo_valor }}</td>
            <td>{{ $materiaEspaciosAudit->fecha }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['materiaEspaciosAudits.destroy', $materiaEspaciosAudit->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('materiaEspaciosAudits.show', [$materiaEspaciosAudit->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
