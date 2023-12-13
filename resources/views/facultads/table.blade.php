<div class="table-responsive">
    <table class="table" id="facultads-table">
        <thead>
        <tr>
            <th>Nombrefacu</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($facultads as $facultad)
            <tr>
                <td>{{ $facultad->nombreFacu }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['facultads.destroy', $facultad->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>

                    <a href="{{ route('facultads.show', [$facultad->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                    @can('view_facultad')
                    <a href="{{ route('facultads.edit', [$facultad->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        @endcan
                        
                        
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
