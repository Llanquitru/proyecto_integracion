<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Range;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::with('range')->get();
        return view('gerente.index', compact('users'));
        //return view('home');
    }

public function edit(User $user)
    {
        // 1. Obtener todos los rangos (para el dropdown del formulario)
        $ranges = Range::all();

        // 2. Retornar la vista 'gerente.edit', pasando el usuario a editar y la lista de rangos.
        return view('gerente.edit', compact('user', 'ranges'));
    }

public function update(Request $request, User $user)
    {
        // 1. Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            // Valida que el email sea único, excepto para el usuario actual.
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'range_id' => 'required|exists:ranges,id', // Asegura que el ID de rango existe
        ]);

        // 2. Actualizar el modelo del usuario
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'range_id' => $request->range_id,
        ]);

        // 3. Redireccionar al listado con un mensaje de éxito
        return redirect()->route('gerente.dashboard')->with('success', 'Usuario actualizado exitosamente.');
        // 🚨 NOTA: Usa 'personal.listado' o el nombre que le hayas dado a tu ruta de listado.
    }


    public function show(User $user)
    {
        // 1. Laravel automáticamente busca y carga el usuario basado en el ID de la URL.
        
        // 2. Si el usuario no tiene la relación 'range' precargada, puedes hacerlo aquí:
        $user->load('range'); 
        
        // 3. Retornar la vista 'gerente.show', pasando el objeto $user.
        return view('gerente.show', compact('user')); 
    }


    public function destroy(User $user)
    {
        // 1. Laravel ya ha cargado el objeto $user. Solo se llama al método delete().
        $user->delete(); 

        // 2. Redirigir al listado con un mensaje de éxito.
        return redirect()->route('gerente.dashboard')->with('success', 'Usuario eliminado exitosamente.');
        // 🚨 NOTA: Usa 'gerente.dashboard' o el nombre que le hayas dado a tu ruta de listado.
    }

}
