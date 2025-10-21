@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card text-center">
        <div class="card-header">
            {{-- Muestra el ID del pedido en el encabezado --}}
            <h1 class="h1 text-center">Detalles del Pedido #{{ $order->id }}</h1>
        </div>
        <div class="card-body text-left">
            
            {{-- Estructura de detalles (usando etiquetas <p> o una lista de definición) --}}
            
            <p>
                <strong>ID del Pedido:</strong> {{ $order->id }}
            </p>
            <p>
                <strong>Pedido:</strong> {{ $order->pedido }}
            </p>
            <p>
                <strong>Precio:</strong> ${{ number_format($order->precio, 2) }}
            </p>
            <p>
                <strong>Mesa Asignada:</strong> {{ $order->mesa }}
            </p>
            <p>
                {{-- Accedemos al nombre del usuario que tomó el pedido --}}
                <strong>Mesero:</strong> {{ $order->user->name ?? 'N/A' }}
            </p>
            <p>
                <strong>Estado:</strong> {{ $order->estado }}
            </p>

            <hr>

            {{-- 🚨 Botones de Acción (Fuera de la tabla) --}}
            <a href="{{ route('order.edit', $order->id) }}" class="btn btn-warning">Editar Pedido</a>
            <a href="{{ route('order.index') }}" class="btn btn-secondary">Volver al Listado</a>

        </div>
    </div>
</div>

@endsection