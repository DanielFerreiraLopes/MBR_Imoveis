<title>Pesquisa - MBR Imoveis</title>
<x-layout>

    --Coisa de Imovel
    <p>{{ $imovel->quarto}}</p>
    <p>{{ $imovel->banheiro}}</p>
    <p>{{ $imovel->preco}}</p>
    <p>{{ $imovel->estado}}</p>
    <p>{{ $imovel->cidade}}</p>
    <p>{{ $imovel->rua}}</p>
    <p>{{ $imovel->bairro}}</p>
    <p>{{ $imovel->numero}}</p>
    <p>{{ $imovel->cep}}</p>
    <p>{{ $imovel->descricao}}</p>

    --Proprietario
    <p>{{ $proprietario->nome}}</p>
    <p>{{ $proprietario->email}}</p>
    <p>{{ $proprietario->telefone}}</p>

    @foreach($imagens as $imagem)
    <img src="{{ $imagem->arquivo }}" alt=""><br>
    @endforeach

</x-layout>