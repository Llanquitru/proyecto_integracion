@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Usuario: {{ $user->name }}</h2>
    
    {{-- Muestra errores de validación si existen --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- El formulario apunta a la ruta 'users.update' y usa el método POST con @method('PUT') --}}
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT') 

        {{-- Campo Nombre --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="{{ old('name', $user->name) }}" required>
        </div>

        {{-- Campo Correo --}}
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="{{ old('email', $user->email) }}" required>
        </div>

        {{-- Campo Rango (Dropdown) --}}
        <div class="mb-3">
            <label for="range_id" class="form-label">Rango</label>
            <select class="form-control" id="range_id" name="range_id" required>
                <option value="">Seleccione un rango</option>
                @foreach ($ranges as $range)
                    <option value="{{ $range->id }}" 
                            {{ old('range_id', $user->range_id) == $range->id ? 'selected' : '' }}>
                        {{ $range->rangos }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('gerente.dashboard') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection