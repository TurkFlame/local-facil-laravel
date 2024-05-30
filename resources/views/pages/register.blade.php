<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo na Mão - Cadastro</title>

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
            transition: transform 0.3s ease;
        }

        .left-column {
            position: relative;
            border-radius: 0 6px 6px 0;
        }

        .left-column img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0px 6px 6px 0px;
        }

        .right-column {
            background-color: #fff;
            border-radius: 0px 6px 6px 0px;
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
            <!-- Metade direita -->
            <div class="col-md-6 left-column shadow">
                <img src="img/grupo-pessoas.jpg" alt="foto">
            </div>
            <!-- Metade esquerda -->
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h3>A Maior Sociedade de Empréstimo entre Pessoas!</h3>
                <hr class="w-100">
                <div class="mt-2 w-75 mx-auto">
                    <h4>Crie a sua Conta</h4>
                    <label>Insira seu email e senha para realizar o cadastro</label>
                </div>

                <div class="p-3 w-75 mx-auto">
                    <form action="/register" method="post">
                        @csrf
                        <div class="form-group">
                            <input name="nome" class="form-control w-100" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control w-100" placeholder="E-mail">
                        </div>
                        <div class="input-group mb-3">
                            <input id="senha" name="senha" type="password" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="confirmarSenha" name="confirmarSenha" type="password" class="form-control" placeholder="Confirme sua Senha" aria-label="Senha" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <?php if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
                            <div class="text-danger">
                                Usuário ou senha inválido(s)
                            </div>
                        <?php } ?>
                        <button class="btn btn-light btn-block mt-3" type="submit">
                            Cadastre-se
                        </button>
                    </form>
                </div>

                <div class="p-3 w-75 mx-auto">
                    <p class="line-container"><b class="line w-25"></b><span class="w-50">Já possui cadastro?</span>
                        <b class="line w-25"></b>
                </div>

                <div class="p-3 w-75 mx-auto">
                    <a href="/login" class="shadow-lg btn btn-dark btn-block">Login</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function(e) {
                const input = this.closest('.input-group').querySelector('input');
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
        });
    </script>
</body>

</html>