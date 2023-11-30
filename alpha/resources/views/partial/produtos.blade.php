@foreach ($produtos as $produto)
    <div class="p-3 col">
        <div class="card shadow-sm">
            @if($produto->ProdutoImagens->count() > 0)
                <img src="{{ $produto->ProdutoImagens[0]->IMAGEM_URL }}" width="100%" height="200">
            @else
                <img src="./images/carrinho.jpg" width="100%" height="200">
            @endif
            <div class="card-body">
                <a class="card-text" href="{{route('produtos.show', $produto->PRODUTO_ID)}}">{{$produto->PRODUTO_NOME}}</a>
                <p class="card-text"><strong>R$ {{$produto->PRODUTO_PRECO}}</strong></p>
            </div>
        </div>
    </div>
@endforeach