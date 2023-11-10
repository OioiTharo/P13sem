<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="UTF-8">
		<title>ALPHA</title>
		<!-- Css proprio-->
		<link rel="stylesheet" type="text/css" href="css/main.css"/>	
		<!-- Colocar icone na pagina -->
		<link rel="icon" href="images/alpha.png" type="image/x-icon"/>
		<link rel="shortcut icon" href="imagens/icone.png" type="image/x-icon"/>
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
				<a href="{{ url('/') }}" class="align-items-center text-decoration-none">
					<img src="./images/logo.png" height="40" class="d-inline-block align-top" alt="">
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
				  <a href="{{ url('/login') }}" class="text-decoration-none text-dark "><i class="material-icons">account_circle</i></a>
				</div>
			</div>
		</div>
	</header>
	<!-- formulario --> 
	<div class="pt-4">
		<div class="pt-4 row row-cols-sm-2 row-cols-md-4 align-items-center justify-content-center">
			<form class="form-signin" method="POST" action="{{ route('login') }}">
			@csrf  
            <div class="text-center mb-4">
				<h1 class="font-weight-normal">Login</h1>
				<p>Não possui conta? <a href="{{ url('/register') }}"class="text-dark">Cadastre-se</a></p>
			  </div>
			  <div class="form-label-group">
				<label for="inputEmail">Endereço de email</label>
				<input type="email" id="inputEmail" class="form-control" placeholder="Endereço de email" name="USUARIO_EMAIL" required autofocus>
			  </div>

			  <div class="form-label-group">
				<label for="inputPassword">Senha</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="USUARIO_SENHA" required>
			  </div>

			  <div class="checkbox m-3">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Lembrar de mim</span>
                </label>
              </div>

			  <button class="btn btn-lg btn-dark btn-block" type="submit">Entrar</button>
			</form>
		</div>
	</div>
	<!-- footer -->
	<footer class="text-center text-lg-start text-muted fixed-bottom"	style="background-color: #f5f5f5;">
	  <!-- Section: Links  -->
	  <section class="">
		<div class="container text-center text-md-start pt-4 pb-4">
		  <!-- Grid row -->
		  <div class="row mt-3">
			<!-- Grid column -->
			<div class="col-12 col-lg-3 col-sm-12 mb-2">
			  <!-- Content -->
			  <a href="https://mdbootstrap.com/" target="_blank" class="">
				<img src="images/logo.png" height="50" />
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