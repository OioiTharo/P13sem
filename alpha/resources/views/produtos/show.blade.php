<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="UTF-8">
		<title>ALPHA</title>
		<!-- Css proprio-->
		<link rel="stylesheet" type="text/css" href="css/main.css"/>	
		<!-- Colocar icone na pagina -->
		<link rel="icon" href="../images/icon.png" type="image/x-icon"/>
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
		
        <style>
            body{font-family: 'Electrolize', sans-serif; margin: 0;}
			.material-icons{width: 40px}
			svg{ background-color: rgb(255, 189, 89);}
			.lowprod{ width:80%;}
			.descricaoProd{}
			.preco{color:rgb(255, 189, 89); }
			.quant{width: 50px; border-radius:6px; border: 1px solid black; height: 40px;	}
			.review { border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; }
			.reviewer-name { font-weight: bold; color: #472468; }
			.review-date { color: #666; }
			.review-text { margin-top: 10px; }
		</style>
    </head>
<body>
    <!-- header -->
	<header class="p-3 bg-light text-dark align-items-center">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center">
				<a href="{{ url('/') }}" class="align-items-center text-decoration-none">
					<img src="../images/logo.png" height="40" class="d-inline-block align-top" alt="">
				</a>

				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
				  <li><a href="{{ url('/') }}" class="nav-link px-2 text-secondary">Home</a></li>
				  <li><a href="{{ url('/produtos') }}" class="nav-link px-2 text-dark">Produtos</a></li>
				  <li><a href="#" class="nav-link px-2 text-dark">Sac</a></li>
				</ul>

				<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
					<input type="search" class="form-control form-control-dark" placeholder="Pesquisar...">
				</form>

				<div class="text-end">
				  <a href="{{ url('/carrinho') }}" class="text-decoration-none text-dark "><i class="material-icons">shopping_cart</i></a>
				  <a href="" class="text-decoration-none text-dark "><i class="material-icons">accessibility</i></a>
				  <a href="{{ url('/perfil') }}" class="text-decoration-none text-dark "><i class="material-icons">account_circle</i></a>
				</div>
			</div>
		</div>
	</header>
	<!-- COLOCAR AQUI --> 
	<div class="p-4 container align-items-center">
       
		<h2>{{$produto->PRODUTO_NOME}}</h2>
		<div class="row">
			<div class="col">
				<table class="table table-borderless lowprod">
                    <tr>
                        <td rowspan="3"><img src="{{ $produto->ProdutoImagens[0]->IMAGEM_URL }}" width="100%" height="300"></td>
                        <td>
                            <svg width="80px" height="80px"></svg>
                        </td>
                    </tr>
                    <tr>
                        <td><svg width="80px" height="80px"></svg></td>
                    </tr>
                    <tr>
                        <td><svg width="80px" height="80px"></svg></td>
                    </tr>
				</table>
			</div>			
			<div class="col descricaoProd">
				<p class="text-justify">{{$produto->PRODUTO_DESC}}</p>
				<h3 class="font-weight-bold preco">{{$produto->PRODUTO_PRECO}}</h3>
                <form method="POST" action="{{route('carrinho.store')}}">
                    <input type="hidden" value="{{$produto->PRODUTO_ID}}">
                    <input type="hidden" value="{{Auth::user()->USUARIO_ID}}">
                    QTD: <input class="quant" type="number" min="0">
                    <button type="submit" class="btn btn-outline-dark">Comprar</button>
                </form>
			</div>
		</div>
		<hr>
		<div class="row">
			<h3>Informações tecnicas</h3>
			<p class="text-justify">Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu</p>
		</div>
		<hr>
		<div class="row">
			<h4>Avaliação dos usuarios: </h4>
			<div class="col" >
				<div class="review">
					<p class="reviewer-name">João</p>
					<p class="review-date">10 de novembro de 2023</p>
					<p class="review-text">Ótimo produto! Estou muito satisfeito com a qualidade.</p>
				</div>
				<div class="review">
					<p class="reviewer-name">Maria</p>
					<p class="review-date">9 de novembro de 2023</p>
					<p class="review-text">Entrega rápida e produto conforme descrição. Recomendo!</p>
				</div>
				<div class="review">
					<p class="reviewer-name">Henrique</p>
					<p class="review-date">4 de agosto de 2023</p>
					<p class="review-text">Muito bom! Melhor produto que já usei.</p>
				</div>
				<div class="review">
					<p class="reviewer-name">Isabella</p>
					<p class="review-date">27 de fevereiro de 2023</p>
					<p class="review-text">Produto conforme descrição!</p>
				</div>
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
				<img src="../images/logo.png" height="50" />
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