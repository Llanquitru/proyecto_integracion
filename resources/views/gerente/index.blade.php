@extends('layouts.app')

@section('content')




<div class="container">
    
    <div class="card text-center">
        <div class="card-header">
            <h1 class="h1 text-center"> Listado de personal</h1>
        </div>
        <div class="card-body">
      
  
            <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Rango</th>
            <th scope="col">Observar</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            {{-- 🚨 INICIO DE LA FILA --}}
            <tr> 
                {{-- 1. ID --}}
                <td>{{ $user->id }}</td>

                {{-- 2. Nombre --}}
                <td>{{ $user->name }}</td>

                {{-- 3. Correo --}}
                <td>{{ $user->email }}</td>

                {{-- 4. Rango --}}
                <td>
                    {{-- Accede a la relación 'range' y luego a la columna 'rango'. 
                        El ?-> es un safe access operator, evita errores si range es null. --}}
                    {{ $user->range->rangos ?? 'N/A' }}
                </td>

                {{-- 5. Observar (Botón) --}}
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}">Observar</a>
                </td>

                {{-- 6. Editar (Botón) --}}
                <td>
                    <a class="btn btn-warning btn-sm" href="{{ route('users.edit', $user->id) }}">Editar</a>
                </td> 

                {{-- 7. Eliminar (Formulario) --}}
                <td>
                    {{-- Necesitas un formulario para el método DELETE --}}
                    <form action="{{route('users.destroy', $user->id) }}" method="POST">
                        @csrf 
                        @method('DELETE')
                       <button type="submit" 
                class="btn btn-danger btn-sm"
                {{-- Opcional: añade una confirmación básica en JavaScript --}}
                onclick="return confirm('¿Estás seguro de que quieres eliminar a este usuario?');">
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
