@extends('layouts.app')



@section('content')

<div class="container">

    <form method="POST" action="{{route('order.store')}}" >
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Pedido</label>
          <input type="text" class="form-control" id="pedido" name="pedido" aria-describedby="funcionarioHelp" placeholder="Ingrese el pedido del cliente" required>
      
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp" placeholder="Ingrese el precio correspondiente" required>
        
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" aria-describedby="estado" placeholder="Ingrese el Minimo" required>
        
          </div>

           <div class="form-group">
            <label for="exampleInputEmail1">Mesa</label>
            <input type="text" class="form-control" id="mesa" name="mesa" aria-describedby="mesa" placeholder="el numero de mesa" required>
        
          </div>
          
      
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </form>

</div>

    
@endsection