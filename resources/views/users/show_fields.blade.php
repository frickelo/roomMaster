<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Role Field -->
<div class="col-sm-12">
    {!! Form::label('role', 'Rol:') !!}
    <p>{{ $user->role }}</p>
</div>

<!-- Carrera Field -->
<div class="col-sm-12">
    {!! Form::label('carrera', 'Carrera:') !!}
    <p>{{ $user->carrera }}</p>
</div>

<!-- Curso Field -->
<div class="col-sm-12">
    {!! Form::label('curso', 'Curso:') !!}
    <p>{{ $user->curso }}</p>
</div>

<!-- Facultad Field -->
<div class="col-sm-12">
    {!! Form::label('facultad', 'Facultad:') !!}
    <p>{{ $user->facultad->nombreFacu ?? 'Sin Facultad' }}</p>
</div>


<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $user->updated_at }}</p>
</div>