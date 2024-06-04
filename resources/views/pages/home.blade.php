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

    <!-- Folha de Estilo do Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="\css\app.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .btn {
            background-color: #212529;
            color: #fff;
            border: none;
            border-radius: 0;
        }

        i {
            color: #fff;
        }
    </style>
</head>

<body class="bg-dark">
    <div id="map"></div>

    <div class="input-container">
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
            <a href="/debitos">
                <button type="button" class="btn btn-primary mb-2">
                    <i class="fas fa-credit-card mr-1"></i> Débitos
                </button>
            </a>
            <a href="/trabalhe-conosco">
                <button type="button" class="btn btn-info mb-2">
                    <i class="fas fa-users mr-1"></i> Trabalhe conosco
                </button>
            </a>
            <a href="/login">
                <button type="button" class="btn btn-success mb-2 btn-final">
                    <i class="fas fa-arrow-circle-left  mr-1"></i> Sair
                </button>
            </a>
        </form>
    </div>

    <?php
    $userId = session()->get('id');
    ?>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Configuração AJAX para incluir o token CSRF em todas as requisições
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var map;
        var markers = [];
        var userId = <?= json_encode($userId); ?>;

        function buscarMapa(id) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lon = position.coords.longitude;

                    if (map) {
                        map.remove();
                    }

                    map = L.map('map').setView([lat, lon], 15);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                    }).addTo(map);
                    L.marker([lat, lon]).addTo(map).bindPopup('Você está aqui!');

                    $.ajax({
                        url: '/getAgiotas',
                        method: 'GET',
                        success: function(data) {
                            var agiotaList = shuffleArray(data); // Embaralha os dados dos agiotas recebidos

                            // Adiciona marcadores ao mapa
                            var numMarkers = Math.floor(Math.random() * 5) + 1;
                            for (var i = 0; i < numMarkers; i++) {
                                var agiota = agiotaList[i];
                                var randomLatOffset = (Math.random() - 0.5) / 111.2 * 5;
                                var randomLonOffset = (Math.random() - 0.5) / (111.2 * Math.cos(lat * Math.PI / 180)) * 5;

                                var icon = L.icon({
                                    iconUrl: agiota.url,
                                    iconSize: [50, 50],
                                    iconAnchor: [25, 50],
                                    popupAnchor: [0, -50]
                                });
                                var marker = L.marker([lat + randomLatOffset, lon + randomLonOffset], {
                                    icon: icon,
                                    draggable: true // torna o marcador arrastável
                                }).addTo(map).bindPopup(criarPopup(agiota.id, agiota.url, agiota.nome, agiota.email, agiota.telefone));
                                markers.push(marker); // adiciona o marcador ao array de marcadores
                            }

                            // Inicia a animação dos marcadores
                            animateMarkers();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            } else {
                alert('Seu navegador não suporta Geolocalização.');
            }
        }

        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        function criarPopup(id, url, nome, email, telefone) {
            var popupContent = `
        <div>
            <img src="${url}" alt="${nome}" width="150" height="150">
            <br>
            <label><b>Nome: </b>${nome}</label>
            <br>
            <label><b>E-mail: </b>${email}</label>
            <br>
            <label><b>Telefone: </b>${telefone}</label>
            <br>
            <div class="d-flex justify-content-center"> <!-- Adicionando classe d-flex e justify-content-center para centralizar -->
                <button class="btn btn-danger btn-sm" onclick="favoritar(${id}, ${userId})" data-toggle="tooltip" title="Favoritar">
                    <i class="fas fa-heart"></i>
                </button>
            </div>
        </div>
    `;
            return popupContent;
        }


        function favoritar(agiota_id, user_id) {
            $.ajax({
                url: '/favoritar-agiota',
                type: 'POST',
                data: {
                    agiotaId: agiota_id,
                    userId: user_id,
                },
                success: function(response) {
                    alert('Agiota favoritado!');
                },
                error: function(xhr, status, error) {
                    alert('Erro ao favoritar o Agiota, por favor tente novamente mais tarde!.');
                    console.log(error);
                    console.log(xhr.responseText);
                }
            });
        }

        function animateMarkers() {
            markers.forEach(function(marker) {
                setInterval(function() {
                    var latlng = marker.getLatLng();
                    var newLatlng = L.latLng(latlng.lat + (Math.random() - 0.5) * 0.01, latlng.lng + (Math.random() - 0.5) * 0.01);
                    marker.setLatLng(newLatlng);
                }, 7000);
            });
        }

        document.addEventListener("DOMContentLoaded", buscarMapa);
    </script>
</body>

</html>