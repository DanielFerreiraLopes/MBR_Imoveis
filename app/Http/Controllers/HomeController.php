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
        $imagens_imoveis = Imagens::all();
        dd($imagens_imoveis);
        return view('home');
    }
}
