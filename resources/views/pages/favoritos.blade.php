<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Favoritos</title>

    <!-- Folha de Estilo do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Folha de Estilo do Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
            color: black;
            text-decoration: none;
        }

        body {
            background-color: #343a40;
            color: black;
        }

        a {
            text-decoration: none!important;
        }

        .btn {
            width: 120px;
            color: black;
            background-color: #fff;
            border-color: transparent !important;
        }

        .btn-danger{
            border-radius: 6px!important;
        }

        .btn-voltar {
            border-radius: 6px !important;
        }

        #input-container {
            width: 100%;
            background-color: transparent;
            padding: 10px 0;
            display: flex;
            justify-content: center;
        }

        #input-container .btn {
            margin-right: 0;
        }

        button {
            border-radius: 0 !important;
        }

        .btn-inicial {
            border-radius: 6px 0 0 6px !important;
        }

        .btn-final {
            border-radius: 0 6px 6px 0 !important;
        }

        .card-body-td {
            padding: 10px;
        }


        h3 {
            margin: 0;
        }
    </style>
</head>

<body class="bg-dark">

    <!-- Conteúdo Principal -->
    <div class="container">
        <!-- Header dentro de um card -->
        <div class="row mt-3">
            <div class="col">
                <div class="card shadow-sm bg-white rounded">
                    <div class="card-body-td">
                        <h3><b>Empresários Favoritados</b></h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Linhas dentro de cards -->
        <?php
        // Dados fictícios
        $listaFavoritos = [
            (object) ['id' => 1, 'nome' => 'João Silva', 'url' => 'https://via.placeholder.com/80'],
            (object) ['id' => 2, 'nome' => 'Maria Santos', 'url' => 'https://via.placeholder.com/80'],
            (object) ['id' => 3, 'nome' => 'Carlos Oliveira', 'url' => 'https://via.placeholder.com/80']
        ];

        foreach ($listaFavoritos as $agiota) {
        ?>
            <div class="row mt-3">
                <div class="col">
                    <div class="card shadow-sm bg-white rounded">
                        <div class="d-flex align-items-center">
                            <img src="<?php echo $agiota->url; ?>" class="img-thumbnail" alt="Foto do Agiota" width="60">
                            <div class="ml-3">
                                <label><?php echo $agiota->nome; ?></label>
                            </div>
                            <div class="ml-auto">
                                <button type="button" class="btn btn-danger w-100" onclick="desfavoritar(<?php echo $agiota->id; ?>)">
                                    <i class="fas fa-times-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <a href="./menu.view.php">
            <button class="shadow-lg btn btn-dark btn-block mt-3 btn-voltar" type="submit">
                Voltar
            </button>
        </a>
    </div>

    <!-- Navbar fixada embaixo -->
    <div id="input-container" class="fixed-bottom">
        <form class="form-inline justify-content-center">
            <a href="/simular">
                <button type="button" class="btn btn-secondary btn-inicial mb-2">
                    <i class="fas fa-handshake mr-1"></i> Simular
                </button>
            </a>
            <a href="/debitos">
                <button type="button" class="btn btn-warning mb-2">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>