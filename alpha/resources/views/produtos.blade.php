<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="UTF-8">
		<title>ALPHA</title>
		<!-- Css proprio-->
		<link rel="stylesheet" type="text/css" href="css/main.css"/>	
		<!-- Colocar icone na pagina -->
		<link rel="icon" href="./images/icon.png" type="image/x-icon"/>
		<link rel="shortcut icon" href="./images/icon.png" type="image/x-icon"/>
		<!-- Google font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Electrolize&display=swap" rel="stylesheet">
		<!-- Icons google -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!--Bootstrap: -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		<meta name="csrf-token" content="{{ csrf_token() }}">
		<style>
            body{font-family: 'Electrolize', sans-serif; margin: 0;}
			.material-icons{width: 40px}
			svg{ background-color: #472468;}
			.categ{ padding: 5px;}
			select{border-radius: 8px; border: 1px solid black; padding: 2px;}
        </style>
	
		<script>

			$(document).ready(function() {
				// Função para carregar produtos com base na categoria selecionada
				function carregarProdutosPorCategoria() {
					var categoriaId = $('#categoria').val();
					
					$.ajax({
						url: '/obter-produtos-por-categoria/' + categoriaId,
						type: 'GET',
						success: function(data) {
							$('#produtosContainer').html(data);
						},
						error: function(error) {
							console.error('Erro ao obter produtos por categoria:', error);
						}
					});
				}

				// Associar a função de carregamento de produtos ao evento de clique no botão de filtro
				$('#filtrarProdutos').on('click', function() {
					carregarProdutosPorCategoria();
				});

				// Carregar os produtos da categoria padrão ao carregar a página
				carregarProdutosPorCategoria();
			});

		</script>
    </head>
<body>
    <!-- header -->
	<header class="p-3 bg-light text-dark align-items-center">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center">
				<a href="{{ url('/') }}" class="align-items-center text-decoration-none">
					<img src="./images/logo.png" height="40" class="d-inline-block align-top" alt="">
				</a>

				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
				  <li><a href="{{ url('/') }}" class="nav-link px-2 text-dark">Home</a></li>
				  <li><a href="{{ url('/produtos') }}" class="nav-link px-2 text-secondary">Produtos</a></li>
				  <li><a href="#" class="nav-link px-2 text-dark">Sac</a></li>
				  <li><a href="{{ url('/logout') }}" class="nav-link px-2 text-dark">Sair</a></li>
				</ul>

				
				<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
					<input type="search"  class="form-control form-control-dark" placeholder="Pesquisar...">
				</form>

				<div class="text-end">
				  <a href="{{ url('/carrinho') }}" class="text-decoration-none text-dark "><i class="material-icons">shopping_cart</i></a>
				  <a href="" class="text-decoration-none text-dark "><i class="material-icons">accessibility</i></a>
				  <a href="{{ url('/perfil') }}" class="text-decoration-none text-dark "><i class="material-icons">account_circle</i></a>
				</div>
			</div>
		</div>
	</header>
	<!-- produtos -->
	<div class="album py-3 bg-light" id="app">
		<div class="container">
			<form id="filtroCategoriasForm">
				<label for="categoria">Categoria:</label>
				<select name="categoria" id="categoria">
					<!-- Opções de categorias vêm do seu banco de dados -->
					<option value="" selected>Todos</option>
					@foreach ($categorias as $categoria)
						<option value="{{ $categoria->CATEGORIA_ID}}">{{ $categoria->CATEGORIA_NOME }}</option>
					@endforeach
				</select>
				<button class="btn btn-dark p-1 " type="button" id="filtrarProdutos">Filtrar</button>
			</form>
		</div>
		<div class="container">
			<div id="produtosContainer" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-5">
				@foreach ($produtos as $produto)
					<div v-for="produto in produtosFiltrados" class="p-3 col">
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
		  	</div>
		</div>
	</div>
	<!-- footer -->
	<footer class="text-center text-lg-start text-muted" style="background-color: #f5f5f5;">
	  <!-- Section: Links  -->
	  <section class="">
		<div class="container text-center text-md-start pt-4 pb-4">
		  <!-- Grid row -->
		  <div class="row mt-3">
			<!-- Grid column -->
			<div class="col-12 col-lg-3 col-sm-12 mb-2">
			  <!-- Content -->
			  <a href="https://mdbootstrap.com/" target="_blank" class="">
				<img src="./images/logo.png" height="50" />
			  </a>
			  <p class="mt-2 text-dark">
				© 2023 GT
			  </p>
			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-6 col-sm-6 col-lg-3">
			  <!-- Links -->
			  <h6 class="text-uppercase text-dark fw-bold mb-2">
				Loja
			  </h6>
			  <ul class="list-unstyled mb-4">
				<li><a class="text-muted" href="#">Endereços</a></li>
				<li><a class="text-muted" href="{{ url('/produtos') }}">Produtos</a></li>
			  </ul>
			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-6 col-sm-6 col-lg-3">
			  <!-- Links -->
			  <h6 class="text-uppercase text-dark fw-bold mb-2">
				Informações
			  </h6>
			  <ul class="list-unstyled mb-4">
				<li><a class="text-muted" href="#">SAC</a></li>
				<li><a class="text-muted" href="#">Reembolsos</a></li>
				<li><a class="text-muted" href="#">Envios</a></li>
			  </ul>
			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-12 col-sm-12 col-lg-3">
			  <!-- Links -->
			  <h6 class="text-uppercase text-dark fw-bold mb-2">Newsletter</h6>
			  <p class="text-muted">Fique dentro de nossas promoções e ofertas!</p>
			  <div class="input-group mb-3">
				<input type="email" class="form-control border" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" />
				<button class="btn btn-light border shadow-0" type="button" id="button-addon2" data-mdb-ripple-color="dark">
				  Enviar
				</button>
			  </div>
			</div>
			<!-- Grid column -->
		  </div>
		  <!-- Grid row -->
		</div>
	  </section>
	  <!-- Section: Links  -->
	</footer>
</body>
</html>