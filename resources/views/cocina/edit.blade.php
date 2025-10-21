@extends('layouts.app')

@section('content')


<div class="container">

    {{-- 🚨 1. CAMBIO CLAVE: FORMULARIO DE ACTUALIZACIÓN --}}
    {{--  - action apunta a la ruta 'order.update' y necesita el ID del pedido. --}}
    {{--  - method="POST" es necesario, pero lo convertiremos a PUT. --}}
    <form method="POST" action="{{ route('order.update', $order->id) }}" >
        @csrf
        {{-- 🚨 2. DIRECTIVA PARA SIMULAR EL MÉTODO PUT/PATCH --}}
        @method('PUT') 
        
        <div class="form-group">
            <label for="pedido">Pedido</label>
            {{-- 🚨 3. PRELLENAR: Usamos 'old()' y el valor actual del pedido --}}
            <input type="text" 
                   class="form-control" 
                   id="pedido" 
                   name="pedido" 
                   placeholder="Ingrese el pedido del cliente" 
                   value="{{ old('pedido', $order->pedido) }}" 
                   required>
        </div>
        
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" 
                   class="form-control" 
                   id="precio" 
                   name="precio" 
                   placeholder="Ingrese el precio correspondiente" 
                   value="{{ old('precio', $order->precio) }}" 
                   required>
        </div>
        
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" 
                   class="form-control" 
                   id="estado" 
                   name="estado" 
                   placeholder="Ingrese el estado" 
                   value="{{ old('estado', $order->estado) }}" 
                   required>
        </div>

        <div class="form-group">
            <label for="mesa">Mesa</label>
            <input type="text" 
                   class="form-control" 
                   id="mesa" 
                   name="mesa" 
                   placeholder="Ingrese el número de mesa" 
                   value="{{ old('mesa', $order->mesa) }}" 
                   required>
        </div>
        
        <button type="submit" class="btn btn-warning">Actualizar Pedido</button>
        {{-- Botón para volver --}}
        <a href="{{ route('order.index', $order->id) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>


@endsection