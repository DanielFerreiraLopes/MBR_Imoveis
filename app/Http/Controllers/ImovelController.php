<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\Usuario;
use App\Models\Imagens;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImovelController extends Controller
{
    public function vendaView()
    {
        $logado = Session::get('info_usuario');

        if (!$logado) {
            return redirect('/login')->with('mensagem_erro', "A pagina só é permitida para usuarios Logados");
        }

        $id_logado = $logado->id;

        $imoveis = DB::table('imovel')
            ->where('id_usuario', $id_logado)
            ->get();

        return view('imovel/venda', [
            'logado' => $logado,
            'imoveis' => $imoveis

        ]);
    }


    public function filtro(Request $request)
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
            $query->where('preco', '<=', $precomax);
        }
        if ($precomini) {
            $query->where('preco', '>=', $precomini);
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

        $imoveis = $query->get();

        // $imoveisfiltro = $query->get();

        return view('home', [
            // 'imoveisfiltro' => $imoveisfiltro,
            'imoveis' => $imoveis,
        ]);
    }

    public function pesquisa(Request $request)
    {

        $pesquisa = $request->input('search');

        $query = Imovel::query();

        if ($pesquisa) {
            $query->where('descricao', 'LIKE', "%$pesquisa%");
        }

        $imoveis = $query->get();

        return view('home', [
            // 'imoveisfiltro' => $imoveisfiltro,
            'imoveis' => $imoveis,
        ]);
    }

    public function cadastro_Imovel(Request $request)
    {
        $logado = Session::get('info_usuario');

        $quarto = $request->input('quarto');
        $banheiro = $request->input('banheiro');
        $preco = $request->input('preco');
        $estado = $request->input('estado');
        $cidade = $request->input('cidade');
        $rua = $request->input('rua');
        $bairro = $request->input('bairro');
        $numero = $request->input('numero');
        $cep = $request->input('cep');
        $descricao = $request->input('descricao');
        $id = $logado->id;

        $encontrar = Imovel::where('numero', $numero)->where('rua', $rua)->where('cidade', $cidade)->where('estado', $estado)->first();

        if ($encontrar) {
            return redirect('/venda')->with('mensagem_erro', "Este imovel ja esta em anuncio");
        }

        if (empty($quarto)) return redirect('/venda')->with('mensagem_erro', "Todas informações devem ser preenchidas");
        if (empty($banheiro)) return redirect('/venda')->with('mensagem_erro', "Todas informações devem ser preenchidas");
        if (empty($preco)) return redirect('/venda')->with('mensagem_erro', "Todas informações devem ser preenchidas");
        if (empty($estado)) return redirect('/venda')->with('mensagem_erro', "Todas informações devem ser preenchidas");
        if (empty($cidade)) return redirect('/venda')->with('mensagem_erro', "Todas informações devem ser preenchidas");
        if (empty($rua)) return redirect('/venda')->with('mensagem_erro', "Todas informações devem ser preenchidas");
        if (empty($bairro)) return redirect('/venda')->with('mensagem_erro', "Todas informações devem ser preenchidas");
        if (empty($numero)) return redirect('/venda')->with('mensagem_erro', "Todas informações devem ser preenchidas");
        if (empty($cep)) return redirect('/venda')->with('mensagem_erro', "Todas informações devem ser preenchidas");
        if (empty($descricao)) return redirect('/venda')->with('mensagem_erro', "Todas informações devem ser preenchidas");

        $id_imovel = DB::table('imovel')->insertGetId([
            'quarto' => $quarto,
            'banheiro' => $banheiro,
            'preco' => $preco,
            'estado' => $estado,
            'cidade' => $cidade,
            'rua' => $rua,
            'bairro' => $bairro,
            'numero' => $numero,
            'cep' => $cep,
            'descricao' => $descricao,
            'id_usuario' => $id
        ]);

        return redirect('/imagens/' . $id_imovel);
    }

    public function alterarView(int $id)
    {

        $imovel = DB::table('imovel')
            ->where('id', $id)
            ->first();

        $imagens = DB::table('imagens_imoveis')
            ->where('id_imovel', $id)
            ->get();

        return view('imovel/alterar', [
            'id_imovel' => $id,
            'imovel' => $imovel,
            'imagens' => $imagens,
        ]);
    }

    public function caminho_alterar(Request $request)
    {

        $id_imovel = $request->input('caminho');

        return redirect('/alterar/' . $id_imovel);
    }

    public function alterar_Imovel(Request $request)
    {
        $logado = Session::get('info_usuario');


        $id = $request->input('imovel');
        $quarto_novo = $request->input('quarto');
        $banheiro_novo = $request->input('banheiro');
        $preco_novo = $request->input('preco');
        $estado_novo = $request->input('estado');
        $cidade_novo = $request->input('cidade');
        $rua_novo = $request->input('rua');
        $bairro_novo = $request->input('bairro');
        $numero_novo = $request->input('numero');
        $cep_novo = $request->input('cep');
        $descricao_novo = $request->input('descricao');



        DB::table('imovel')
            ->where('id', $id)
            ->update([
                'quarto' => $quarto_novo,
                'banheiro' => $banheiro_novo,
                'preco' => $preco_novo,
                'estado' => $estado_novo,
                'cidade' => $cidade_novo,
                'rua' => $rua_novo,
                'bairro' => $bairro_novo,
                'numero' => $numero_novo,
                'cep' => $cep_novo,
                'descricao' => $descricao_novo
            ]);

        return redirect('/conta');
    }

    public function imagens_alterar(Request $request)
    {
        $path = $request->file('image')->store('fotos', 'public');

        $id = $request->input('id_imovel');

        DB::table('imagens_imoveis')->insert([
            'arquivo' => '/storage/' . $path,
            'id_imovel' => $id
        ]);

        return redirect('/alterar/' . $id);
    }

    public function delete_imagens_alterar(Request $request)
    {

        $id = $request->input('id_imagem');

        $id_imovel = $request->input('id_imovel');

        $path = DB::table('imagens_imoveis')
            ->where('id', $id)
            ->first('arquivo');

        $novo_texto = str_replace("/storage", "public", $path->arquivo);

        if (Storage::exists($novo_texto)) {
            Storage::delete($novo_texto);
        }

        DB::table('imagens_imoveis')->where('id', '=', $id)->where('id_imovel', '=', $id_imovel)->delete();


        return redirect('/alterar/' . $id_imovel);
    }



    public function imovelView(int $id)
    {

        $imovel = DB::table('imovel')
            ->where('id', $id)
            ->first();

        $imagens = DB::table('imagens_imoveis')
            ->where('id_imovel', $id)
            ->get();

        $proprietario = DB::table('usuario')
            ->where('id', $imovel->id_usuario)
            ->first();

        return view('imovel/imovel', [
            'id_imovel' => $id,
            'imovel' => $imovel,
            'imagens' => $imagens,
            'proprietario' => $proprietario,

        ]);
    }

    public function verimovel(Request $request)
    {

        $id_caminho = $request->input('caminho');

        return redirect('/imovel/' . $id_caminho);
    }
}
