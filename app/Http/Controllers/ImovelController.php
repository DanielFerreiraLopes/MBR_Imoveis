<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function vendaView()
    {
        return view('imovel/venda');
    }

    public function pesquisaView()
    {
        return view('imovel/pesquisa');
    }
}
