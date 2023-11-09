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
		<style>
            body{font-family: 'Electrolize', sans-serif; margin: 0;}
			.material-icons{width: 40px}
			svg{ background-color: #472468;}
			.categ{ padding: 5px;}
			.profile{background-color: #DADADA; padding: 5px; border-radius: 8px;}
        </style>
		<script>
			$('#meuModal').modal(options);
			
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
	
    <div class="container p-3">
		<h1>Perfil do Usuário</h1>
        <div class="profile p-3">
            <h2>Dados do Usuário</h2>
            <p><strong>Nome:</strong> <span id="name">{{Auth::user()->USUARIO_NOME}}</span></p>
            <p><strong>CPF:</strong> <span id="numero">{{Auth::user()->USUARIO_CPF}}</span></p>
            <p><strong>Email:</strong> <span id="email">{{Auth::user()->USUARIO_EMAIL}}</span></p>
			<hr>
			<h3>Endereços:</h3>
			@foreach (Auth::user()->Enderecos as $endereco)
				<div class="row">
					<div class="col"><p><strong>Logradouro:</strong> <span id="endereco">{{ $endereco->ENDERECO_NOME }}</span></p></div>
					<div class="col"><p><strong>Numero:</strong> <span id="endereco">{{ $endereco->ENDERECO_NUMERO }}</span></p></div>
					<div class="col"><p><strong>CEP:</strong> <span id="endereco">{{ $endereco->ENDERECO_CEP}}</span></p></div>
				</div>
				<div class="row">
					<div class="col"><p><strong>Complemento:</strong> <span id="endereco">{{ $endereco->ENDERECO_COMPLEMENTO }}</span></p></div>
					<div class="col"><p><strong>Cidade:</strong> <span id="endereco">{{ $endereco->ENDERECO_CIDADE }}</span></p></div>
					<div class="col"><p><strong>Estado:</strong> <span id="endereco">{{ $endereco->ENDERECO_ESTADO }}</span></p></div>
				</div>
				<hr>
			@endforeach
				<button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Adicionar</button>
						
        </div>
		<br>
        <div class="profile p-3">
            <h2>Histórico de Compras</h2>
            <ul id="">
                <!-- As compras do usuário serão preenchidas dinamicamente com JavaScript -->
            </ul>
        </div>
    </div>
	<!--modal -->

	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="p-5" method="POST" action="{{route('endereco.store')}}">
					@csrf
					<div class="text-center mb-4">
						<p class="font-weight-normal">Dados para entrega:</p>
					</div>
					<div class="p-1 form-row">
						<input type="text" class="form-control" placeholder="Endereço" id="endereco" name="ENDERECO_NOME" required>
					</div>
					<div class="pt-4 form-row">
						<div class="col">
							<select class="form-select-sm form-control" name="ENDERECO_LOGRADOURO" required>
							<option selected>Logradouro</option>
							<option value="Rua">Rua</option>
							<option value="Avenida">Avenida</option>
							<option value="Praça">Praça</option>
							<option value="Viaduto">Viaduto</option>
							<option value="Outros">Outros</option>
							</select>
						</div>
						<div class="col">
							<input type="text" class="form-control" placeholder="Número" name="ENDERECO_NUMERO" required id="numero">
						</div>
						<div class="col-6">
							<input type="text" class="form-control" placeholder="Complemento" name="ENDERECO_COMPLEMENTO" id="complemento">
						</div>
					</div>
					<div class="pt-4 form-row">
						<div class="col">
							<input type="text" class="form-control" placeholder="CEP" id="cep" name="ENDERECO_CEP">
						</div>
						<div class="col">
							<input type="text" class="form-control" placeholder="Cidade" id="cidade" name="ENDERECO_CIDADE">
						</div>
						<div class="col-3">
							<select class="form-select-sm form-control" required id="uf" name="ENDERECO_ESTADO">
								<option selected>UF</option>
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
							</select>
						</div>
					</div>
					<div class="pt-1 checkbox mb-3">
						<label>
						<input type="checkbox" value="lembrar de mim"> Lembrar de mim
						</label>
					</div>
					<button class="btn btn-lg btn-dark btn-block" type="submit">Salvar</button>
				</form>
			</div>
  		</div>
	</div>
	
	<!-- footer -->
	<footer class="text-center text-lg-start text-muted"	style="background-color: #f5f5f5;">
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