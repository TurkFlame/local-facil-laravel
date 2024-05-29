<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulação de Empréstimo</title>

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
    </style>

<body class="bg-dark">
    <!-- Card com Inputs -->
    <div class="p-3 w-75 mx-auto">
        <h3>Simulação de empréstimo</h3>
        <form id="loan-form">
            <!-- Input de Valor -->
            <div class="mt-5 form-row align-items-center">
                <div class="col-md-3">
                    <label for="loan-amount">Valor do Empréstimo</label>
                </div>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="loan-amount" placeholder="Informe o valor que você deseja" required>
                </div>
            </div>
            <!-- Input de Parcelas -->
            <div class="form-row align-items-center mt-3">
                <div class="col-md-3">
                    <label for="loan-installments">Número de Parcelas</label>
                </div>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="loan-installments" placeholder="Informe quantas parcelas você deseja pagar" required>
                </div>
            </div>

            <!-- Alinhar o botão à direita -->
            <div class="text-right mt-3">
                <button type="button" class="btn btn-success custom-btn" id="calculate-btn">Calcular</button>
            </div>

            <!-- Inputs que serão exibidos após o cálculo -->
            <div id="result-fields" style="display: none;">
                <div class="form-row align-items-center mt-3">
                    <div class="col-md-3">
                        <label for="total-loan-amount">Valor Total do Empréstimo</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="total-loan-amount" placeholder="Valor total do empréstimo" disabled>
                    </div>
                </div>
                <div class="form-row align-items-center mt-3">
                    <div class="col-md-3">
                        <label for="installment-value">Valor por Parcela</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="installment-value" placeholder="Valor de cada parcela" disabled>
                    </div>
                </div>
                <div class="form-row align-items-center mt-3">
                    <div class="col-md-3">
                        <label class="label-imposto" for="interest-rate">Juros</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="interest-rate" placeholder="Juros" disabled>
                    </div>
                </div>
                <div class="form-row align-items-center mt-3">
                    <div class="col-md-3">
                        <label class="label-imposto" for="aliquot">Aliquota</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="aliquot" placeholder="Aliquota" disabled>
                    </div>
                </div>
                <div class="form-row align-items-center mt-3">
                    <div class="col-md-3">
                        <label class="label-imposto" for="iof">IOF</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="iof" placeholder="IOF" disabled>
                    </div>
                </div>
                <div class="form-row align-items-center mt-3">
                    <div class="col-md-3">
                        <label class="label-imposto" for="insurance">Valor do Seguro</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="insurance" placeholder="Valor do seguro" disabled>
                    </div>
                </div>
                <!-- Botão de Enviar -->
                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-success custom-btn">Salvar</button>
                </div>
            </div>

            <!-- Barra de navegação -->
            <div id="input-container">
                <form class="form-inline">
                    <a href="/favoritos">
                        <button type="button" class="btn btn-danger mb-2 btn-inicial">
                            <i class="fas fa-star mr-1"></i> Favoritos
                        </button>
                    </a>
                    <a href="./debitos.view.php">
                        <button type="button" class="btn btn-primary mb-2">
                            <i class="fas fa-credit-card mr-1"></i> Débitos
                        </button>
                    </a>
                    <a href="./home.view.php">
                        <button type="button" class="btn btn-success mb-2 btn-final">
                            <i class="fas fa-map mr-1"></i> Mapa
                        </button>
                    </a>

                </form>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Função para calcular o empréstimo
            function calcularEmprestimo() {
                // Obter valores dos inputs
                const valor = parseFloat($('#loan-amount').val());
                const parcelas = parseInt($('#loan-installments').val());

                // Verificar se os valores são válidos
                if (isNaN(valor) || isNaN(parcelas) || valor <= 0 || parcelas <= 0) {
                    alert('Por favor, insira valores válidos.');
                    return;
                }

                // Lógica de cálculo (exemplo)
                const juros = valor * 5.01;
                const aliquota = valor * 0.01;
                const iof = valor * 0.6;
                const seguro = valor * 0.02;
                const valorTotal = valor + juros + aliquota + iof + seguro;
                const valorParcela = valorTotal / parcelas;

                // Atualizar valores nos inputs desabilitados
                $('#interest-rate').val(juros.toFixed(2));
                $('#aliquot').val(aliquota.toFixed(2));
                $('#iof').val(iof.toFixed(2));
                $('#insurance').val(seguro.toFixed(2));
                $('#total-loan-amount').val(valorTotal.toFixed(2));
                $('#installment-value').val(valorParcela.toFixed(2));

                // Mostrar campos de resultado
                $('#result-fields').show();
            }

            // Adicionar evento ao botão "Calcular"
            $('#calculate-btn').on('click', calcularEmprestimo);
        });
    </script>
</body>

</html>