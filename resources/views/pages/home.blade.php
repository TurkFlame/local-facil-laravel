<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <!-- Folha de Estilo do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Folha de Estilo do Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="estilo/estilo.css">

    <!-- Folha de Estilo do Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        .btn {
            width: 120px;
            color: black;
            background-color: #fff;
            border-color: transparent !important;
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
    </style>

</head>

<body class="bg-dark">
    <div id="map" style="height: calc(100% - 50px);">
    </div>

    <div id="input-container">
        <form class="form-inline">
            <a href="./lista_favoritos.view.php">
                <button type="button" class="btn btn-danger mb-2 btn-inicial">
                    <i class="fas fa-star mr-1"></i> Favoritos
                </button>
            </a>
            <a href="./lista_agiotas.view.php">
                <button type="button" class="btn btn-primary mb-2">
                    <i class="fas fa-male mr-1"></i> Empresários
                </button>
            </a>
            <a href="./lista_dividas.view.php">
                <button type="button" class="btn btn-warning mb-2">
                    <i class="fas fa-credit-card mr-1"></i> Débitos
                </button>
            </a>

            <button type="button" class="btn btn-success mb-2 btn-final" onclick="buscarCEP()"> <i class="fas fa-map mr-1"></i> Mapa</button>
        </form>
    </div>

    <script>
        var map;

        function favoritar(id) {
            // Seu código para favoritar um agiota
        }

        function visualizar(id) {
            // Seu código para visualizar informações de um agiota
        }

        function criarPopup(id, imagemUrl, nome, estrelas, favorito) {
            // Seu código para criar um popup no mapa
        }

        function buscarCEP() {
            // Seu código para buscar o CEP e atualizar o mapa
        }

        function shuffleArray(array) {
            // Seu código para embaralhar um array
        }
    </script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>