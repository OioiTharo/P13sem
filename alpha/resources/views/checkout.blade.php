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
			main{width:80%; margin-left: 10%;}
			.bd-placeholder-img { font-size: 1.125rem; text-anchor: middle; -webkit-user-select: none; -moz-user-select: none; user-select: none; }
			@media (min-width: 768px) {  .bd-placeholder-img-lg { font-size: 3.5rem; } }
			.end{ margin-bottom: 25px;}
			.pag{ margin-top: 25px;}
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
	<main class="p-3">
		 <div class="row g-5">
			<div class="col-md-5 col-lg-4 order-md-last">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
				  <span class="text-dark">Seu carrinho</span>
				</h4>
        <ul class="list-group mb-3">
			@php
				$totalCompra = -5;
			@endphp
          	@foreach ($carrinhos as $carrinho)
			@if( $carrinho->ITEM_QTD > 0 &&  $carrinho->USUARIO_ID == Auth::user()->USUARIO_ID)
		  	<li class="list-group-item d-flex justify-content-between lh-sm">
				<div>
					<h6 class="my-0">{{$carrinho->produto->PRODUTO_NOME}}</h6>
				</div>
				<span class="text-muted">{{$carrinho->produto->PRODUTO_PRECO}}</span>
			</li>

			@php
				$totalCompra += $carrinho->ITEM_QTD * $carrinho->produto->PRODUTO_PRECO ;
			@endphp
			@else

			@endif
			@endforeach
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Codigo Promocional</h6>
              <small>BLACKFRIDAY</small>
            </div>
            <span class="text-success">−R$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (BRL)</span>
            <strong>{{$totalCompra}}</strong>
          </li>
        </ul>

        <form class="card p-2" method="POST" action="{{route('perfil.store')}}">
			@csrf
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Codigo Promocional">
            <button type="submit" class="btn btn-secondary">Adicionar</button>
          </div>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Endereço</h4>
		<div class="container">
			<div class="end">
				<label> Logradouro: </label>
                <select class="form-select-sm form-control" name="ENDERECO_ID" required>
					@foreach (Auth::user()->Enderecos as $endereco)
                    <option  value="{{ $endereco->ENDERECO_ID }}" >{{ $endereco->ENDERECO_NOME }}, nº {{ $endereco->ENDERECO_NUMERO }}</option>
                	@endforeach
				</select>
                <button type="button" class="btn btn-dark mt-4" data-toggle="modal" data-target=".bd-example-modal-lg">Adicionar</button>
			</div>
		</div>
		<hr>
         
          <h4 class="mb-3 ">Pagamento</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Cartão de Crédito</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Cartão de Débito</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nome no cartão</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">O nome completo igual ao cartão</small>
              <div class="invalid-feedback">
                Nome obrigatório
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Número do cartão</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Número  obrigatório
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Vencimento</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Vencimento obrigatório
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Código de segurança obrigatório
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-dark btn-lg" type="submit">Continuar</button>
        </form>
      </div>
    </div>
  </main>

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