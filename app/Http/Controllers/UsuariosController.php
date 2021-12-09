<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    public function index()
    {
        $users = Usuario::orderBy('id', 'asc')->get();

        return view('usuarios.index', ['users' => $users, 'pagina' => 'usuarios']);
    }

    public function create()
    {
        return view('usuarios.create', ['pagina' => 'usuarios']);
    }

    public function insert(Request $form)
    {
        $user = new Usuario();

        $user->name = $form->name;
        $user->email = $form->email;
        $user->username = $form->username;
        $user->password = Hash::make($form->password);

        $user->save();

        return redirect()->route('usuarios.index');
    }

    // Ações de login
    public function login(Request $form)
    {
        // Está enviando o formulário
        if ($form->isMethod('POST')) {
            
            // Se um dos campos não for preenchidos, nem tenta o login e volta para a página anterior
            $credentials = $form->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
            
            // Tenta o login
            if (Auth::attempt($credentials)) {
                session()->regenerate();
                return redirect()->route('home');
            } else {

                // Login deu errado (usuário ou senha inválidos)
                return redirect()->route('login')->with(
                    'erro',
                    'Usuário ou senha inválidos.'
                );
            }
        }

        return view('usuarios.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
