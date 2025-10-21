<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $orders = Order::with('user')->get();
        return view('cocina.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Order::create([
            'pedido' => $request->pedido,
            'precio' => $request->precio,
            'estado' => $request->estado,
            'mesa' => $request->mesa,
                 'user_id'=>Auth::user()->id, 
        ]);

         return redirect()->route('mesero.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
       $order->load('user'); 

    // Retorna la vista, pasando el objeto de un solo pedido.
    return view('cocina.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {


        return view('cocina.edit', compact('order'));
        
    
 
    }

    
   
    public function update(Request $request, Order $order)
    {
    
$request->validate([
        'pedido' => 'required|string|max:255',
        'precio' => 'required|string|max:255', // Corregí string a numeric si es un precio
        'estado' => 'required|string|max:50',
        'mesa' => 'required|string', // Cambié string a integer si es un número
    ]);

    // 2. Actualizar el pedido
    $order->update([
       
        'pedido' => $request->pedido,
        
        'precio' => $request->precio,
        'estado' => $request->estado,
        'mesa' => $request->mesa,
    ]);
   
return redirect()->route('order.index', $order)->with('success', 'Pedido actualizado.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
    $order->delete();

    return redirect()->route('order.index')->with('success', 'Pedido eliminado exitosamente.');
    }
}
