<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Administrador;


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
    //use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function showLoginForm()
    {          
        return view('auth.login');        
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        

        $where = ['email' => $request->email, 'clave' => $request->password];

        $usuarioValido = Administrador::where($where)->find(1);

        if($usuarioValido == null){
            if($request->session()->get('intentosSesion') <3){
                $intentosSesion = $request->session()->get('intentosSesion');
                $intentosSesion = $intentosSesion + 1;
                $request->session()->put('intentosSesion', $intentosSesion);

                return redirect('login')
                  ->withErrors(array("messages"=>"Datos incorrectos"))
                  ->withInput();   
            }else{
                echo "denunciado papu";
                //Código adicional de Seguridad (CAPTCHA)
            }
         
        }else{
            $intentosSesion = $request->session()->put('intentosSesion',0);
            $request->session()->put('sesionAdministrador', true);
            return redirect('admin/revisarVentas');
        }

    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ]);
    }

    public function username()
    {
        return 'email';
    }
    public function logout(Request $request) {
        $request->session()->put('sesionAdministrador',false);
        return redirect($this->redirectTo);
    }


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

}
