<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function loginView()
    {
        return view('log/login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $senha = $request->input('senha');
        
        $usuario = Usuario::where('email', $email)->where('senha', $senha)->first();

        if ($usuario) {
            Session::put('info_usuario', $usuario);
            return redirect('/');
        } else {
            exit("Usuario nao encontrado");
        }

    }


    public function cadastroView()
    {
        return view('log/cadastro');
    }

   

    public function cadastro(Request $request)
    {
        $nome = $request->input('nome');
        $telefone = $request->input('tele');
        $email = $request->input('email');
        $conemail = $request->input('confirmemail');
        $senha = $request->input('senha');

        DB::table('usuario')->insert([
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'senha' => $senha
        ]);
    }


    public function contaView()
    {
        return view('log/conta');
    }
}
