

@canany(['edit_facultad','delete_facultad','create_facultad'])
<li class="nav-item">
    <a href="{{ route('facultads.index') }}"
       class="nav-link {{ Request::is('facultads*') ? 'active' : '' }}">
        <p>Facultad</p>
    </a>
</li>
@endcan

@canany(['edit_facultad','delete_facultad','create_facultad'])
<li class="nav-item">
    <a href="{{ route('carreras.index') }}"
       class="nav-link {{ Request::is('carreras*') ? 'active' : '' }}">
        <p>Carreras</p>
    </a>
</li>
@endcan


@canany(['edit_facultad','delete_facultad','create_facultad'])
<li class="nav-item">
    <a href="{{ route('cursos.index') }}"
       class="nav-link {{ Request::is('cursos*') ? 'active' : '' }}">
        <p>Cursos</p>
    </a>
</li>

@endcan



@canany(['edit_facultad','delete_facultad','create_facultad'])
<li class="nav-item">
    <a href="{{ route('materias.index') }}"
       class="nav-link {{ Request::is('materias*') ? 'active' : '' }}">
        <p>Materias</p>
    </a>
</li>
@endcan



@canany(['edit_facultad','delete_facultad','create_facultad'])
<li class="nav-item">
    <a href="{{ route('espacios.index') }}"
       class="nav-link {{ Request::is('espacios*') ? 'active' : '' }}">
        <p>Espacios</p>
    </a>
</li>
@endcan



<li class="nav-item">
    <a href="{{ route('materiaEspacios.index') }}"
       class="nav-link {{ Request::is('materiaEspacios*') ? 'active' : '' }}">
        <p>Clase del dia</p>
    </a>
</li>






@canany(['edit_facultad','delete_facultad','create_facultad'])
<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Usuarios</p>
    </a>
</li>
@endcan

@canany(['edit_facultad','delete_facultad','create_facultad'])
<li class="nav-item">
    <a href="{{ route('materiaEspaciosAudits.index') }}"
       class="nav-link {{ Request::is('materiaEspaciosAudits*') ? 'active' : '' }}">
        <p>Auditoria</p>
    </a>
</li>

@endcan


