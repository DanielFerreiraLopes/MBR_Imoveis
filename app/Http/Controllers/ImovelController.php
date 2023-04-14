<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function vendaView()
    {
        return view('imovel/venda');
    }

    public function pesquisaView(Request $request)
    {
        $query = Usuario::query();

        $telefone = $request->input('telefone');
        $nome = $request->input('nome');
        $email = $request->input('email');

        if($telefone) {
            $query->where('telefone', '=', $telefone);
        }

        if($nome) {
            $query->where('nome', 'LIKE', "%$nome%");
        }

        if($email) {
            $query->where('email', 'LIKE', "%$email%");
        }

        $usuariosFiltrados = $query->get();

        return view('imovel/pesquisa', [
            'usuariosFiltrados' => $usuariosFiltrados,
        ]);

        $query = Imovel::query();

        $quarto = $request->input('quarto');
        $banheiro = $request->input('banheiro');
        $preco = $request->input('preco');
        $estado = $request->input('estado');
        $cidade = $request->input('cidade'); 
        $rua = $request->input('rua');
        $bairro = $request->input('bairro');
        $numero = $request->input('numero');
        $cep = $request->input('cep');


        if($quarto) {
            $query->where('quarto', '=', $quarto);
        }
        if($banheiro) {
            $query->where('banheiro', '=', $banheiro);
        }
        if($estado) {
            $query->where('estado', 'LIKE', "%$estado%");
        }
        if($cidade) {
            $query->where('cidade', 'LIKE', "%$cidade%");
        }
        if($rua) {
            $query->where('rua', 'LIKE', "%$rua%");
        }
        if($preco) {
            $query->where('preco', 'LIKE', $preco);
        }
        if($bairro) {
            $query->where('bairro', 'LIKE', "%$bairro%");
        }
        if($numero) {
            $query->where('numero', '=', $numero);
        }
        if($cep) {
            $query->where('cep', '=', $cep);
        }

        $imoveisViltro = $query->get();

        return view('imovel/pesquisa', [
            'imoveisViltro' => $imoveisViltro,
        ]);


       
    }
}
