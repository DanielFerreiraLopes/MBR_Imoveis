<?php

namespace App\Http\Controllers;

use App\Models\Imagens;
use App\Models\Imovel;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ImovelController extends Controller
{
    public function vendaView()
    {
        return view('imovel/venda');
    }

    
    public function pesquisaView(Request $request)
    {


        $query = Imovel::query();

        $quarto = $request->input('quarto');
        $banheiro = $request->input('banheiro');
        $precomax = $request->input('precomax');
        $precomini = $request->input('precomini');

        $estado = $request->input('estado');
        $cidade = $request->input('cidade');
        $rua = $request->input('rua');
        $bairro = $request->input('bairro');
        $numero = $request->input('numero');
        $cep = $request->input('cep');


        if ($quarto) {
            $query->where('quarto', '=', $quarto);
        }
        if ($banheiro) {
            $query->where('banheiro', '=', $banheiro);
        }
        if ($estado) {
            $query->where('estado', 'LIKE', "%$estado%");
        }
        if ($cidade) {
            $query->where('cidade', 'LIKE', "%$cidade%");
        }
        if ($rua) {
            $query->where('rua', 'LIKE', "%$rua%");
        }
        if ($precomax) {
            $query->where('preco', '>=', $precomax);
        }
        if ($precomini) {
            $query->where('preco', '<=', $precomini);
        }

        if ($bairro) {
            $query->where('bairro', 'LIKE', "%$bairro%");
        }
        if ($numero) {
            $query->where('numero', '=', $numero);
        }
        if ($cep) {
            $query->where('cep', '=', $cep);
        }

        $imoveisFiltro = $query->get();

        return view('imovel/pesquisa', [
            'imoveisFiltro' => $imoveisFiltro,
        ]);
    }
}