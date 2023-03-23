<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function loginView()
    {
        return view('log/login');
    }

    public function login(Request $request)
    {
        $form = $request->all();
        dd($form);
    }


    public function cadastroView()
    {
        return view('log/cadastro');
    }

    public function cadastro(Request $request)
    {
        $form = $request->all();
        dd($form); 
    }


    public function contaView()
    {
        return view('log/conta');
    }
}
