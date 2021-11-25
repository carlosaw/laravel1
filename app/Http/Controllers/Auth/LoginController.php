<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;// Pega o Request
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;// Processo de Login

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
    protected $redirectTo = '/config';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request) {
        // Tentativas de login
        $tries = $request->session()->get('login_tries', 0);// Começa com zero

        return view('login', [// Manda pro view
            'tries' => $tries
        ]);
    }

    public function authenticate(Request $request) {
        $creds = $request->only(['email', 'password']);

        // Esquecer sessão --- get, put, forget
        //$request->session()->forget('login_tries');
        
        if(Auth::attempt($creds)) {
            $request->session()->put('login_tries', 0);// Zera tentativa se acertar
            return redirect()->route('config.index');
        } else {
            // Trocar
            $tries = intval($request->session()->get('login_tries', 0));
            // Incrementar tentativas
            $request->session()->put('login_tries', ++$tries);

            return redirect()->route('login')
                ->with('warning', 'E-mail e/ou senha inválidos!');            
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
