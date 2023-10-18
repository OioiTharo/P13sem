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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            body{font-family: 'Electrolize', sans-serif; margin: 0;}
			.material-icons{width: 40px}
			svg{ background-color: #472468;}
			.categ{ padding: 5px;}
        </style>
    </head>
<body>
    <!-- header -->
	<header class="p-3 bg-light text-dark align-items-center">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center">
				<a href="#" class="align-items-center text-decoration-none">
					<img src="./images/logo.png" height="40" class="d-inline-block align-top" alt="">
				</a>

				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
				  <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
				  <li><a href="#" class="nav-link px-2 text-dark">Sobre</a></li>
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-dark px-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Categorias
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="#">Categoria 1</a>
					  <a class="dropdown-item" href="#">Categoria 2</a>
					  <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="#">Algo</a>
					</div>
				  </li>
				  <li><a href="#" class="nav-link px-2 text-dark">Sac</a></li>
				</ul>

				<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
					<input type="search" class="form-control form-control-dark" placeholder="Pesquisar...">
				</form>

				<div class="text-end">
				  <a href="" class="text-decoration-none text-dark "><i class="material-icons">shopping_cart</i></a>
				  <a href="" class="text-decoration-none text-dark "><i class="material-icons">accessibility</i></a>
				  <a href="login.html" class="text-decoration-none text-dark "><i class="material-icons">account_circle</i></a>
				</div>
			</div>
		</div>
	</header>
	<!-- carousel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
		<div class="carousel-item active">
		   <img class="d-block w-100 " src="./images/3.png" alt="First slide">
		</div>
		<div class="carousel-item">
		  <img class="d-block w-100" src="./images/4.png" alt="Second slide">
		</div>
		<div class="carousel-item">
		  <img class="d-block w-100" src="./images/5.png" alt="Third slide">
		</div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
	<!-- promoções -->
	<main>
	  <div class="album py-3 bg-light">
		<div class="container">
		  <h1>Promoções</h1>
		  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-5">
			@foreach ($produtos as $produto)
			<div class="p-3 col">
			  <div class="card shadow-sm">
				<svg class="bd-placeholder-img card-img-top" width="100%" height="200"><rect width="100%" height="100%" fill="#FFBD59"/></svg>

				<div class="card-body">
					<p class="card-text">{{$produto->PRODUTO_NOME}}</p>
					<p class="card-text">{{$produto->PRODUTO_PRECO}}</p>
				</div>
			  </div>
			</div>
			@endforeach
		  </div>
		</div>
	  </div>
	</main>
	<!-- banners -->
	<div class="py-3 bg-light">
		<div class="container">
			<div class="row row-cols-sm-1 row-cols-md-2">
				<div class="col-6">
                    <img src="./images/1.png" width="100%" height="200px">
				</div>
				<div class="col-6">
                    <img src="./images/2.png" width="100%" height="200px">
				</div>
			</div>
		</div>
	</div>
	<!-- mais pesquisados -->
	<div class="album py-3 bg-light">
		<div class="container">
		  <h1>Mais pesquisados</h1>
		  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-5">
			<div class="col">
			  <div class="card shadow-sm">
				<svg class="bd-placeholder-img card-img-top" width="100%" height="200"><rect width="100%" height="100%" fill="#FFBD59"/></svg>

				<div class="card-body">
					<p class="card-text">Nome</p>
					<p class="card-text">Preço</p>
				</div>
			  </div>
			</div>
			<div class="col">
			  <div class="card shadow-sm">
				<svg class="bd-placeholder-img card-img-top" width="100%" height="200"><rect width="100%" height="100%" fill="#FFBD59"/></svg>

				<div class="card-body">
					<p class="card-text">Nome</p>
					<p class="card-text">Preço</p>
				</div>
			  </div>
			</div>
			<div class="col">
			  <div class="card shadow-sm">
				<svg class="bd-placeholder-img card-img-top" width="100%" height="200"><rect width="100%" height="100%" fill="#FFBD59"/></svg>

				<div class="card-body">
					<p class="card-text">Nome</p>
					<p class="card-text">Preço</p>
				</div>
			  </div>
			</div>
			<div class="col">
			  <div class="card shadow-sm">
				<svg class="bd-placeholder-img card-img-top" width="100%" height="200"><rect width="100%" height="100%" fill="#FFBD59"/></svg>

				<div class="card-body">
					<p class="card-text">Nome</p>
					<p class="card-text">Preço</p>
				</div>
			  </div>
			</div>
			<div class="col">
			  <div class="card shadow-sm">
				<svg class="bd-placeholder-img card-img-top" width="100%" height="200"><rect width="100%" height="100%" fill="#FFBD59"/></svg>

				<div class="card-body">
					<p class="card-text">Nome</p>
					<p class="card-text">Preço</p>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	<!-- categorias -->
	<div class=" py-3 bg-light">
		<div class="container">
			<div class="row row-cols-sm-4 row-cols-md-6 text-center align-middle">
				<div class="col border bg-white categ"><a href="#" class="text-decoration-none text-dark">Categoria 1</a></div>
				<div class="col border categ"><a href="#" class="text-decoration-none text-dark">Categoria 2</a></div>
				<div class="col border bg-white categ"><a href="#" class="text-decoration-none text-dark">Categoria 3</a></div>
				<div class="col border categ"><a href="#" class="text-decoration-none text-dark">Categoria 4</a></div>
				<div class="col border bg-white categ"><a href="#" class="text-decoration-none text-dark">Categoria 5</a></div>
				<div class="col border categ"><a href="#" class="text-decoration-none text-dark">Categoria 6</a></div>
				<div class="col border bg-white categ"><a href="#" class="text-decoration-none text-dark">Categoria 7</a></div>
				<div class="col border categ"><a href="#" class="text-decoration-none text-dark">Categoria 8</a></div>
				<div class="col border bg-white categ"><a href="#" class="text-decoration-none text-dark">Categoria 9</a></div>
				<div class="col border categ"><a href="#" class="text-decoration-none text-dark">Categoria 10</a></div>
				<div class="col border bg-white categ"><a href="#" class="text-decoration-none text-dark">Categoria 11</a></div>
				<div class="col border categ"><a href="#" class="text-decoration-none text-dark">Categoria 12</a></div>
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
				<li><a class="text-muted" href="#">Sobre</a></li>
				<li><a class="text-muted" href="#">Endereços</a></li>
				<li><a class="text-muted" href="#">Produtos</a></li>
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