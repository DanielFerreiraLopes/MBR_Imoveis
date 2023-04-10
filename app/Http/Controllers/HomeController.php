<?php

namespace App\Http\Controllers;

use App\Models\Imagens;
use App\Models\Imovel;
use App\Models\Usuario;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeView()
    {
        $usuario = Usuario::find(1);
        $imoveis = Imovel::all();

        return view('home', [
            "imoveis" => $imoveis,
            "usuario" => $usuario,
        ]);
    }
}
