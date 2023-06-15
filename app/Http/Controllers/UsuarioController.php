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
            return redirect('/login')->with('mensagem_erro', "Usuario não encontrado");
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
            return redirect('/cadastro')->with('mensagem_erro', "A confirmação de email esta incorreta");
        }

        $confirma1 = Usuario::where('email', $email)->first();
        $confirma2 = Usuario::where('telefone', $telefone)->first();
        if ($confirma1 || $confirma2) {
            return redirect('/cadastro')->with('mensagem_erro', "Esse Email ou Telefone já esta cadastrado, use outro");
        }

        DB::table('usuario')->insert([
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'senha' => $senha
        ]);

        return redirect('/login');
    }


    public function contaView()
    {
        $logado = Session::get('info_usuario');

        if (!$logado) {
            return redirect('/login')->with('mensagem_erro', "A pagina só é permitida para usuarios Logados");
        }


        $id_logado = $logado->id;

        $imoveis = DB::table('imovel')
            ->where('id_usuario', $id_logado)
            ->get();

        return view('log/conta', [
            'logado' => $logado,
            'imoveis' => $imoveis

        ]);
    }

    public function conta(Request $request)
    {

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

    public function listar_imoveis()
    {
        $logado = Session::get('info_usuario');
    }

    public function deletar_imovel(Request $request)
    {
        $logado = Session::get('info_usuario');

        $id = $request->input('id_imovel');

        $imagens = DB::table('imagens_imoveis')
            ->where('id_imovel', $id)
            ->get();

        foreach ($imagens as $imagem) {

            $delete = str_replace("/storage", "public", $imagem->arquivo);

            if (Storage::exists($delete)) {
                Storage::delete($delete);
            }

            DB::table('imagens_imoveis')->where('id_imovel', '=', $id)->delete();

            DB::table('imovel')->where('id', '=', $id)->where('id_usuario', '=', $logado->id)->delete();

            return redirect('/conta');
        }
    }


    public function imagensView(int $id)
    {
        $imovel = Imovel::find($id);

        $imagens = DB::table('imagens_imoveis')
            ->where('id_imovel', $id)
            ->get();

        return view('log/imagens', [
            'imovel' => $imovel,
            'id_imovel' => $id,
            'imagens' => $imagens,
        ]);
    }

    public function imagens(Request $request)
    {
        $path = $request->file('image')->store('fotos', 'public');

        $id = $request->input('id_imovel');

        DB::table('imagens_imoveis')->insert([
            'arquivo' => '/storage/' . $path,
            'id_imovel' => $id
        ]);

        return redirect('/imagens/' . $id);
    }

    public function delete_imagens(Request $request)
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


        return redirect('/imagens/' . $id_imovel);
    }
}
