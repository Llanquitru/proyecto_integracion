@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalles del Personal: {{ $user->name }}</h2>
        </div>
        <div class="card-body">
            
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nombre Completo:</strong> {{ $user->name }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
            
            <p>
                <strong>Rango Asignado:</strong> 
                {{-- Accede a la relación 'range' y luego a la columna 'rangos' (o 'rango' si es singular) --}}
                {{ $user->range->rangos ?? 'Sin asignar' }}
            </p>
            
            <p><strong>Fecha de Creación:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
        </div>
        <div class="card-footer">
            {{-- Botón para volver al listado --}}
            <a href="{{ route('gerente.dashboard') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection