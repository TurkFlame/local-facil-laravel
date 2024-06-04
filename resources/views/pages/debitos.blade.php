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

    <link rel="stylesheet" href="\css\app.css">
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
                <a href="/trabalhe-conosco">
                    <button type="button" class="btn btn-info mb-2">
                        <i class="fas fa-users mr-1"></i> Trabalhe conosco
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