@canany(['edit_facultad', 'delete_facultad', 'create_facultad', 'view_facultad'])
<li class="nav-item">
    <a href="{{ route('facultads.index') }}"
       class="nav-link {{ Request::is('facultads*') ? 'active' : '' }}">
        <p>Facultad</p>
    </a>
</li>
@endcan

@canany(['edit_carrera', 'delete_carrera', 'create_carrera', 'view_carrera'])
<li class="nav-item">
    <a href="{{ route('carreras.index') }}"
       class="nav-link {{ Request::is('carreras*') ? 'active' : '' }}">
        <p>Carreras</p>
    </a>
</li>
@endcan

@canany(['edit_curso', 'delete_curso', 'create_curso', 'view_curso'])
<li class="nav-item">
    <a href="{{ route('cursos.index') }}"
       class="nav-link {{ Request::is('cursos*') ? 'active' : '' }}">
        <p>Cursos</p>
    </a>
</li>
@endcan

@canany(['edit_materia', 'delete_materia', 'create_materia', 'view_materia'])
<li class="nav-item">
    <a href="{{ route('materias.index') }}"
       class="nav-link {{ Request::is('materias*') ? 'active' : '' }}">
        <p>Materias</p>
    </a>
</li>
@endcan

@canany(['edit_espacio', 'delete_espacio', 'create_espacio', 'view_espacio'])
<li class="nav-item">
    <a href="{{ route('espacios.index') }}"
       class="nav-link {{ Request::is('espacios*') ? 'active' : '' }}">
        <p>Espacios</p>
    </a>
</li>
@endcan

@canany(['edit_materia_espacio', 'delete_materia_espacio', 'create_materia_espacio', 'view_materia_espacio'])
<li class="nav-item">
    <a href="{{ route('materiaEspacios.index') }}"
       class="nav-link {{ Request::is('materiaEspacios*') ? 'active' : '' }}">
        <p>Clase del día</p>
    </a>
</li>
@endcan



@canany(['edit_facultad', 'delete_facultad', 'create_facultad'])
<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Usuarios</p>
    </a>
</li>
@endcan

@canany(['edit_facultad', 'delete_facultad', 'create_facultad'])
<li class="nav-item">
    <a href="{{ route('materiaEspaciosAudits.index') }}"
       class="nav-link {{ Request::is('materiaEspaciosAudits*') ? 'active' : '' }}">
        <p>Auditoría</p>
    </a>
</li>
@endcan
