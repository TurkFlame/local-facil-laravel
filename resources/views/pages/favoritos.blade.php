<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>

    <!-- Folha de Estilo do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Folha de Estilo do Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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

        .label-imposto {
            color: gray;
        }

        #input-container {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: transparent;
            padding: 10px 0;
            display: flex;
            justify-content: center;
            z-index: 999;
        }

        #input-container .btn {
            margin-right: 0;
        }

        .btn {
            background-color: #fff;
            color: black;
            border: none;
            border-radius: 0 !important;
        }

        .custom-btn {
            border-radius: 6px !important;
        }

        .btn-inicial {
            border-radius: 6px 0 0 6px !important;
        }

        .btn-final {
            border-radius: 0 6px 6px 0 !important;
        }

        label,
        p,
        i {
            color: black;
        }

        .card {
            margin-bottom: 10px;
        }

        .btn-desfavoritar {
            border-radius: 8px !important;
            background-color: #ee0e0e !important;
        }
    </style>
</head>

<body class="bg-dark">

    <!-- Header dentro de um card -->
    <div class="p-3 w-75 mx-auto">
        <h3>Favoritos</h3>

        <div id="accordion">
            <?php
use App\Http\Controllers\UserFavoriteAgiotasController;
use App\Models\Agiota;

$userFavoriteAgiotasController = new UserFavoriteAgiotasController;



$listaFavoritos = $userFavoriteAgiotasController->getFavoritesAgiotasByUserId(session()->get('id'));

foreach ($listaFavoritos as $agiota) {
    $agiotaModel = new Agiota;
    $agiota = $agiotaModel->getAgiotaById($agiota->agiota_id);

                            ?>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"
                    id="heading<?php    echo $agiota->id; ?>" data-toggle="collapse"
                    data-target="#collapse<?php    echo $agiota->id; ?>" aria-expanded="true"
                    aria-controls="collapse<?php    echo $agiota->id; ?>">
                    <h5 class="mb-0">
                        <label><?php    echo $agiota->nome; ?></label>
                    </h5>
                    <div data-toggle="tooltip" title="Desfavoritar">
                        <button type="button" class="btn btn-danger btn-desfavoritar" onclick="<?php 
                                            $userFavoriteAgiotasController->desfavoritarAgiota($agiota->id, session()->get('id'))?>
                                            ">
                            <i class="fas fa-times-circle"></i>
                        </button>
                        <i class="fas fa-chevron-down ml-3" id="icon-<?php    echo $agiota->id; ?>"></i>
                    </div>
                </div>

                <div id="collapse<?php    echo $agiota->id; ?>" class="collapse"
                    aria-labelledby="heading<?php    echo $agiota->id; ?>" data-parent="#accordion">
                    <div class="card-body d-flex">
                        <img src="<?php    echo $agiota->url; ?>" class="img-thumbnail mr-3" alt="Foto do Agiota"
                            width="80">
                        <div>
                            <p>Detalhes adicionais sobre <?php    echo $agiota->nome; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
            ?>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script>
        // Script para alternar ícones conforme o estado do accordion
        $('#accordion .collapse').on('show.bs.collapse', function () {
            let id = $(this).attr('id').split('collapse')[1];
            $('#icon-' + id).removeClass('fa-chevron-down').addClass('fa-chevron-up');
        });

        $('#accordion .collapse').on('hide.bs.collapse', function () {
            let id = $(this).attr('id').split('collapse')[1];
            $('#icon-' + id).removeClass('fa-chevron-up').addClass('fa-chevron-down');
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>