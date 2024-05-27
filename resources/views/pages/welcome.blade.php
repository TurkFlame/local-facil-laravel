<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agiota na Mão</title>

	<!-- Folha de Estilo do Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Folha de Estilo do Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Importar a fonte Roboto do Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

	<style>
		:root {
			--main-font: 'Roboto', sans-serif;
		}

		html,
		body {
			height: 100%;
			margin: 0;
			padding: 0;
			font-family: var(--main-font);
			color: #fff;
		}

		body {
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
		}

		.right-column {
			position: relative;
			border-radius: 6px 0 0 6px;
		}

		.right-column img {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			object-fit: cover;
			border-radius: 6px 0 0 6px;
		}

		h3,
		h5,
		label {
			font-family: var(--main-font);
			font-weight: 700;
		}

		label {
			font-size: 12px;
			color: gray;
		}

		.line-container {
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.line {
			background-color: #fff;
			height: 1px;
			font-size: 5px;
		}
	</style>
</head>

<body class="bg-dark">
	<div class="container-fluid h-100">
		<div class="row h-100">
			<!-- Metade esquerda -->
			<div class="col-md-6 d-flex flex-column justify-content-center">
				<h3>A Maior Sociedade de Empréstimo entre Pessoas!</h3>
				<hr class="w-100">
				<div class="mt-5 w-75 mx-auto">
					<h4>Realize o Login em sua Conta</h4>
					<label>Insira seu email e senha para realizar o login</label>
				</div>

				<div class="p-3 w-75 mx-auto">
					<form action="../valida_login.php" method="post">
						<div class="form-group">
							<input name="email" type="email" class="form-control w-100" placeholder="E-mail">
						</div>
						<div class="form-group mt-1 mb-1">
							<input name="senha" type="password" class="form-control w-100" placeholder="Senha">
						</div>
						<?php if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
							<div class="text-danger">
								Usuário ou senha inválido(s)
							</div>
						<?php } ?>
						<button class="btn btn-light btn-block mt-3" type="submit">
							Logar
						</button>
					</form>
				</div>

				<div class="p-3 w-75 mx-auto">
					<p class="line-container"><b class="line w-25"></b><span class="w-50">Não possui cadastro?</span> <b class="line w-25"></b>
				</div>

				<div class="p-3 w-75 mx-auto">
					<a href="/signin" class="shadow-lg btn btn-dark btn-block">Cadastre-se</a>
				</div>
			</div>
			<!-- Metade direita -->
			<div class="col-md-6 right-column shadow">
				<img src="{{ asset('img/agiotas-cumprimento2.jpg') }}" alt="foto">
			</div>
		</div>
	</div>
</body>

</html>