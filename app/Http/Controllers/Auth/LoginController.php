<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    protected function redirectTo()
    {
         
        // Obtener el usuario autenticado
        $user = Auth::user();
        
     


        $userRangeName = $user->range?->rangos; 


   

        switch ($userRangeName) {
            case 'gerente':
                return '/gerente/index';
            case 'cocinero':
                return '/cocina/index';
            case 'mesero':
                return '/mesero/index';
            case 'sin asignar':
                return '/gerente/malo';
                
            default :
         
                
                return '/gerente/malo'; 

                 
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
