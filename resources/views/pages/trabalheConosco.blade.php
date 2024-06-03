<?php
$telaAtual = 'agiota';
@include('barra_navegacao')

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalhe conosco</title>

    <!-- Folha de Estilo do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Folha de Estilo do Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Importar a fonte Roboto do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="\css\app.css">

</head>

<body class="bg-dark">
    <!-- Card com Inputs -->
    <div class="p-3 w-75 mx-auto">
        <h3>Trabalhe conosco</h3>
        <form id="loan-form" action="/trabalhe-conosco" method="post">
            @csrf
            <!-- Input de Nome -->
            <div class="mt-5 form-row align-items-center">
                <div class="col-md-3">
                    <label for="name">Nome</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Informe o seu nome">
                </div>
            </div>
            <!-- Input Extras -->
            <div class="form-row align-items-center mt-3">
                <div class="col-md-3">
                    <label for="age">Idade</label>
                </div>
                <div class="col-md-9">
                    <input type="integer" name="age" class="form-control" id="age" placeholder="Informe a sua idade">
                </div>
            </div>
            <div class="form-row align-items-center mt-3">
                <div class="col-md-3">
                    <label for="procurado">Possui passagem pela polícia?</label>
                </div>
                <div class="col-md-9">
                    <div class="btn-group" role="group" aria-label="Possui passagem pela polícia?">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="passagem_policia" id="passagem_policia_sim" autocomplete="off" checked>
                            <label class="form-check-label" for="passagem_policia_sim">Sim</label>
                        </div>
                        <div class="form-check ml-3">
                            <input class="form-check-input" type="radio" name="passagem_policia" id="passagem_policia_nao" autocomplete="off">
                            <label class="form-check-label" for="passagem_policia_nao">Não</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Input de Contato -->
            <div class="form-row align-items-center mt-3">
                <div class="col-md-3">
                    <label for="phone">Número de Telefone</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Informe seu telefone para contato" required>
                </div>
            </div>

            <div class="form-row align-items-center mt-3">
                <div class="col-md-3">
                    <label for="email">E-mail</label>
                </div>
                <div class="col-md-9">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Informe seu E-mail para contato" required>
                </div>
            </div>

            <div class="form-row align-items-center mt-3">
                <div class="col-md-3">
                    <label id="terms-label" class="termos">Termos de serviço</label>
                </div>

                <div class="col-md-9">  
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="termos_servico" id="termos_servico" required>
                        <label class="form-check-label" for="termos_servico">Aceitar termos de serviço</label>
                    </div>
                </div>
            </div>
            <!-- Botão de Enviar -->
            <div class="text-right mt-3 mb-5">
                <button type="submit" class="btn btn-success custom-btn">Salvar</button>
            </div>
    </div>
    </form>

    <!-- Barra de navegação -->
    <div id="input-container">
        <form class="form-inline">
            <a href="/favoritos">
                <button type="button" class="btn btn-danger mb-2 btn-inicial">
                    <i class="fas fa-star mr-1"></i> Favoritos
                </button>
            </a>
            <a href="/debitos">
                <button type="button" class="btn btn-primary mb-2">
                    <i class="fas fa-credit-card mr-1"></i> Débitos
                </button>
            </a>
            <a href="/home">
                <button type="button" class="btn btn-success mb-2 btn-final">
                    <i class="fas fa-map mr-1"></i> Mapa
                </button>
            </a>

        </form>
    </div>

    </div>

    <script>
        document.getElementById('terms-label').addEventListener('click', function() {
            window.open('https://www.qad.com/documents/legal/terms-portugal.pdf', '_blank');
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>