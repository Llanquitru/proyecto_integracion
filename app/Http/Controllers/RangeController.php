<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Obtener el usuario autenticado y su rango
        $user = Auth::user();
        
        // Cargar el nombre del rango (ej: "mesero", "cocina", "gerente")
        $userRangeName = $user->range->rangos; 

        // 2. Usar una estructura switch para direccionar
        switch ($userRangeName) {
            case 'gerente':
                // Retorna la vista: resources/views/gerente/index.blade.php
                return view('gerente.index');
                break;
            
            case 'cocina':
                // Retorna la vista: resources/views/cocina/index.blade.php
                return view('cocina.index');
                break;

            case 'mesero':
                // Retorna la vista: resources/views/mesero/index.blade.php
                return view('mesero.index');
                break;
            
            default:
                // Retorna una vista por defecto o maneja un error 403 (Acceso denegado)
                abort(403, 'Acceso no autorizado para este rango.');
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
