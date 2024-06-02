<div id="input-container">
    <form class="form-inline">
        <?php
        // Função para verificar a tela atual e definir os botões correspondentes
        function exibirBotoesNavegacao($telaAtual)
        {
            switch ($telaAtual) {
                case 'favoritos':
                    echo '
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
                        <a href="/home">
                            <button type="button" class="btn btn-success mb-2 btn-final">
                                <i class="fas fa-map mr-1"></i> Mapa
                            </button>
                        </a>
                    ';
                    break;
                case 'debitos':
                    echo '
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
                    ';
                    break;
                case 'home':
                    echo '
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
                            <button type="button" class="btn btn-primary btn-final mb-2">
                                <i class="fas fa-credit-card mr-1"></i> Débitos
                            </button>
                        </a>
                    ';
                    break;
                case 'simular':
                    echo '
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
                    ';
                    break;
                default:
                    // Se a tela atual não for reconhecida, exibe todos os botões
                    echo '
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
                            <button type="button" class="btn btn-primary btn-final mb-2">
                                <i class="fas fa-credit-card mr-1"></i> Débitos
                            </button>
                        </a>
                        <a href="/home">
                            <button type="button" class="btn btn-success mb-2 btn-final">
                                <i class="fas fa-map mr-1"></i> Mapa
                            </button>
                        </a>
                    ';
                    break;
            }
        }
        $telaAtual = ''; 
        exibirBotoesNavegacao($telaAtual);
        ?>
    </form>
</div>