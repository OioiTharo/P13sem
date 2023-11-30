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
 		 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		<script>
			$(document).ready(function () {
				$('.editar-btn').click(function () {
					var produtoId = $(this).data('produto-id');
					$('#produto_id').val(produtoId);
				});
			});
		</script>


		<style>
            body{font-family: 'Electrolize', sans-serif; margin: 0;}
			.material-icons{width: 40px}
			svg{ background-color: #472468;}
			.categ{ padding: 5px;}
			.quant{width: 50px; border-radius:6px; border: 1px solid black; height: 40px; text-align:center;}
        </style>
    </head>
<body class="bg-light" text-dark" >
    <!-- header -->
	<header class="p-3 bg-light text-dark align-items-center">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center">
				<a href="{{ url('/') }}" class="align-items-center text-decoration-none">
					<img src="./images/logo.png" height="40" class="d-inline-block align-top" alt="">
				</a>

				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
				  <li><a href="{{ url('/') }}" class="nav-link px-2 text-dark">Home</a></li>
				  <li><a href="{{ url('/produtos') }}" class="nav-link px-2 text-dark">Produtos</a></li>
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


    <!--Aqui-->
    <div class="py-3 bg-light">
		<div class="container">
            <div class="row ">
				<div class="p-3 col">
					<div class="row border bg-dark text-white">
						<div class="p-3 col">Produto</div>
						<div class="p-3 col">Preço Unitário</div>
						<div class="p-3 col">Quantidade</div>
						<div class="p-3 col">Total (BRL)</div>
					</div>
					@php
						$totalCompra = 0;
					@endphp

					
					@foreach ($carrinhos as $item)
						@if($item->ITEM_QTD > 0)
						<form method="POST" action="{{route('carrinho.store')}}">
							@csrf
							<div class="row border">
								<div class="p-3 col">{{$item->produto->PRODUTO_NOME}}</div>
								<div class="p-3 col">R$ {{$item->produto->PRODUTO_PRECO}}</div>
								<div class="p-3 col text-align-center">
									<input type="hidden" name="PRODUTO_ID" value="{{$item->PRODUTO_ID}}">
									<input type="number" class="quant" value="{{$item->ITEM_QTD}}" name="ITEM_QTD" /> 
									<button class="ml-3 btn btn-dark editar-btn" type="submit">Salvar</button>
								</div>
								<div class="p-3 col">R$ {{$item->ITEM_QTD * $item->produto->PRODUTO_PRECO}}</div>
							</div>
						</form>
						@php
							$totalCompra += $item->ITEM_QTD * $item->produto->PRODUTO_PRECO;
						@endphp
						@else
							
						@endif
						
					@endforeach	

					<div class="row border">
						<div class="p-3 col"></div>
						<div class="p-3 col"></div>
						<div class="p-3 col font-weight-bold">Total da compra:</div>
						<div class="p-3 col font-weight-bold">R$ {{$totalCompra}}</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-end">
				<a href="{{ url('/checkout') }}" class="checkout-btn"><button class="btn btn-dark">Finalizar compra</button></a>
			</div>
		</div>
	</div>
    
    <!-- footer -->
	<footer class="text-center text-lg-start text-muted fixed-bottom" style="background-color: #f5f5f5;">
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


