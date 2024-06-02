<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Débitos</title>

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

        .table-container {
            margin-top: 20px;
        }

        .table {
            color: #fff;
        }

        .bg-dark {
            background-color: #343a40 !important;
        }


        .table {
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="p-3 w-75 mx-auto">
        <h3>Listagem de Débitos</h3>

        <div class="table-container">
            <table class="table table-dark table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Valor Total</th>
                        <th scope="col">Parcelas</th>
                        <th scope="col">Data para pagamento</th>
                    </tr>
                </thead>
                <?php

                use App\Http\Controllers\UserDividasController;

                $userDividasController = new UserDividasController;
                $listaDividas = $userDividasController->getDividasByUserId(session()->get('id'));
                ?>
                <tbody>
                    <?php if (empty($listaDividas)) : ?>
                        <tr>
                            <td colspan="3">echo Você não possui débitos no momento.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($listaDividas as $divida) : ?>
                            <tr>
                                <td><?php echo "R$ " . $divida->valor_total; ?></td>
                                <td><?php echo $divida->quantidade_parcelas; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($divida->data_pagamento)); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Barra de navegação -->
        <div id="input-container">
            <form class="form-inline">
                <a href="/favoritos">
                    <button type="button" class="btn btn-danger mb-2 btn-inicial">
                        <i class="fas fa-star mr-1"></i> Favoritos
                    </button>
                </a>
                <a href="/simular">
                    <button type="button" class="btn btn-secondary mb-2">
                        <i class="fas fa-handshake mr-1"></i> Simular
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
</body>

</html>