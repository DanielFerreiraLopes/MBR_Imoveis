<title>Home - MBR Imoveis</title>
<x-layout>
    <!-- conectando e mostrando as informações do banco na pagina  -->
    <ul>
        <li>
            {{ $usuario->nome }}
            @foreach($usuario->imoveis as $imovel)
                <ul>
                    <li>
                        {{ $imovel->preco }}
                        @foreach($imovel->imagens as $imagem)
                            <ul>
                                <li>{{ $imagem->arquivo }}</li>
                            </ul>
                        @endforeach
                    </li>
                </ul>
            @endforeach
        </li>
    </ul>
    
    <table>
        <thead>
            <tr>
                <th>Quartos</th>
                <th>Bairro</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            @foreach($imoveis as $imovel)
                <tr>
                    <td>{{ $imovel->quartos }}</td>
                    <td>{{ $imovel->bairro }}</td>
                    <td>{{ $imovel->preco }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</x-layout>