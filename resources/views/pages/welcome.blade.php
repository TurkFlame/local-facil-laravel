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
			box-shadow: -10px 0 25px rgba(0, 0, 0, 0.2);
		}
	</style>
</head>

<body class="bg-light">
	<div class="container-fluid h-100">
		<div class="row h-100">
			<!-- Metade esquerda -->
			<div class="col-md-6 d-flex flex-column justify-content-center">
				<h3 class="mb-5 fs-2">A Maior Sociedade de Empréstimo entre Pessoas!</h3>

				<div class="p-3 w-75 mx-auto">
					<h4 class="mb-0 fs-2">Realize o Login em sua Conta</h4>
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
						<button class="btn btn-dark btn-block mt-3" type="submit">
							Entrar
						</button>
					</form>
				</div>

				<div class="mt-4 text-center">
					<a href="/signin" class="shadow-sm btn btn-dark w-50 ml-2">Cadastre-se</a>
					<a href="/login" class="shadow-sm btn btn-info w-50 mt-2">Logar</a>
				</div>
			</div>
			<!-- Metade direita -->
			<div class="col-md-6 right-column">
				<img src="{{ asset('img/agiotas-cumprimento2.jpg') }}" alt="foto">
			</div>
		</div>
	</div>
</body>

</html>