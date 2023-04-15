<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function logout()
    {

        Session::flush();

        return redirect('/login');
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

        if ($email != $conemail) {
            exit("Email esta Incorreto");
        }

        DB::table('usuario')->insert([
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'senha' => $senha
        ]);

        return redirect('log/login');
    }


    public function contaView()
    {
        $logado = Session::get('info_usuario');

            return view('log/conta', [
                'logado' => $logado,
            ]);
    }

    public function conta(Request $request) {

        $logado = Session::get('info_usuario');
        
        $nomenovo = $request->input('nome_novo');
        $telefonenovo = $request->input('tele_novo');
        $emailnovo = $request->input('email_novo');
        $senhanovo = $request->input('senha_novo'); 

      


        DB::table('usuario')
        ->where('id', $logado->id)
        ->update([
            'nome' => $nomenovo,
            'email' => $emailnovo,
            'telefone' => $telefonenovo,
            'senha' => $senhanovo
        ]);

        /* Atu7alizar os dados na sessão */

        return redirect('/');
    }
}
