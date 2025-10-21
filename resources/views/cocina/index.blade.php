@extends('layouts.app')

@section('content')




<div class="container">
    
    <div class="card text-center">
        <div class="card-header">
            <h1 class="h1 text-center">Pedidos cosina</h1>
        </div>
        <div class="card-body">
      
  
            <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Pedido</th>
            <th scope="col">Precio</th>
            <th scope="col">Mesa</th>
            <th scope="col">Estado</th>
            <th scope="col">Mesero</th>
            <th scope="col">Observar</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
           
            <tr> 
             
                <td>{{ $order->id }}</td>

                <td>{{ $order->pedido }}</td>

              
                <td>{{ $order->precio }}</td>
  <td>{{ $order->mesa }}</td>
    <td>{{ $order->estado }}</td>
            
 <td>{{ $order->user->name }}</td>


                {{-- 5. Observar (Botón) --}}
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('order.show', $order->id) }}">Observar</a>
                </td>

                {{-- 6. Editar (Botón) --}}
                <td>
                    <a class="btn btn-warning btn-sm" href="{{ route('order.edit', $order->id) }}">Editar</a>
                </td> 

                {{-- 7. Eliminar (Formulario) --}}
                <td>
                    {{-- Necesitas un formulario para el método DELETE --}}
                    <form action="{{route('order.destroy', $order->id) }}" method="POST">
                        @csrf 
                        @method('DELETE')
                       <button type="submit" 
                class="btn btn-danger btn-sm"
                {{-- Opcional: añade una confirmación básica en JavaScript --}}
                onclick="return confirm('¿Estás seguro de que quieres eliminar a este pedido?');">
            Eliminar
        </button>
                    </form>
                </td>
            {{-- 🚨 FIN DE LA FILA --}}
            </tr>
        @endforeach
    </tbody>
</table>
              




      
        </div>
       
      </div>
  </div>

@endsection
