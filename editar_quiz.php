<?php
include_once("protectmn.php");

include_once("conexao-loginmn.php");

if(!isset($_SESSION)){
    session_start();
}

    $query_questoes = "SELECT * FROM quiz";
    $dados_questoes = $mysqli->query($query_questoes);


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/editar-quiz.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Editar quiz</title>
</head>
<body>

    <div class="options">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">Jovens IASD Mundo Novo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <button style="color: #000;" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="master dropdown-item" href="alterar_status.php">Alterar Status</a></li>
                        <li><a class="master dropdown-item" href="cadastro_questoes.php">Cadastrar quiz</a></li>
                        <li><a class="master dropdown-item" href="editar_quiz.php">Editar quiz</a></li>
                        <li><a class="responder-quiz dropdown-item" href="quiz.php">Responder quiz</a></li>
                        <li><a class="dropdown-item" href="ranking.php">Ranking</a></li>
                        <li><a class="dropdown-item" href="chat.php">Chat</a></li>
                        <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </div>


    <div class="quiz">
    <div class="boas-vindas">
    <span>Classe Jovem IASD Mundo Novo</span><br><br>
    <span>Olá, seja bem vindo(a) <?php echo $_SESSION['nome']; ?>!</span><br>
    <span>Aqui estão as questões do quiz</span><br>
    </div>

    <div class="modal fade" id="visPedidoModal" tabindex="-1" aria-labelledby="visPedidoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visPedidoModalLabel">Informações do Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErroVis"></span>
                    <dl class="row">
                        <dt class="form-label">Código Pedido</dt>
                        <dd class="form-control"><span id="iditem"></span></dd>

                        <dt class="form-label">Item</dt>
                        <dd class="form-control"><span id="item"></span></dd>

                        <dt class="form-label">Descrição</dt>
                        <dd class="form-control"><span id="descricao_item"></span></dd>

                        <dt class="form-label">Preço de compra</dt>
                        <dd class="form-control"><span id="vlr_compra_item"></span></dd>

                        <dt class="form-label">Preço de venda</dt>
                        <dd class="form-control"><span id="vlr_venda_item"></span></dd>

                        <dt class="form-label">Mínimo</dt>
                        <dd class="form-control"><span id="est_min_item"></span></dd>

                        <dt class="form-label">Máximo</dt>
                        <dd class="form-control"><span id="est_max_item"></span></dd>

                        <dt class="form-label">Estoque</dt>
                        <dd class="form-control"><span id="saldo_inicial_item"></span></dd>

                        <dt class="form-label">Cadastro</dt>
                        <dd class="form-control"><span id="cadastro"></span></dd>

                        <dt class="form-label">Cadastro em:</dt>
                        <dd class="form-control"><span id="cadastro_em"></span></dd>

                    </dl>
                </div>
                <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                        </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editQuestoesModal" tabindex="-1" aria-labelledby="editQuestoesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editquestoesModalLabel">Editar questão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form style="text-align: center;" id="edit-questoes-form">

                        <input type="hidden" name="id" id="editid">

                        <div class="mb-3">
                            <label for="questao" class="col-form-label">Questão:</label>
                            <input type="text" name="questao" class="form-control" id="editquestao">
                        </div>
                        <div class="mb-3">
                            <label for="alternativa_a" class="col-form-label">Alternativa A:</label>
                            <input type="text" name="alternativa_a" class="form-control" id="editalternativa_a">
                        </div>
                        <div class="mb-3">
                        <label for="alternativa_b" class="col-form-label">Alternativa B:</label>
                            <input type="text" name="alternativa_b" class="form-control" id="editalternativa_b">
                        </div>
                        <div class="mb-3">
                        <label for="alternativa_c" class="col-form-label">Alternativa C:</label>
                            <input type="text" name="alternativa_c" class="form-control" id="editalternativa_c">
                        </div>
                        <div class="mb-3">
                        <label for="alternativa_d" class="col-form-label">Alternativa D:</label>
                            <input type="text" name="alternativa_d" class="form-control" id="editalternativa_d">
                        </div>
                        <div class="mb-3">
                        <label for="resposta" class="col-form-label">Resposta:</label>
                            <input type="text" name="resposta" class="form-control" id="editresposta">
                        </div>
                        <span id="msgAlertaErroEdit"></span>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-outline-warning btn-sm" id="edit-questao-btn" value="Salvar" name="cadQuestao"/>
                        </div>
                        <span id="msgAlertaErroEdit"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="boas-vindas">
        <span>Consultar questões</span><br>
<!--
            <form action="" method="GET">
                <div class="busca">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Tipo: </span>
                        <select class="form-select" id="inputGroupSelect01" name="questao" id="questao">
                        <option class="form-control" type="text" value="Receber">Receber</option>
                        <option class="form-control" type="text" value="Enviar">Enviar</option>
                        </select>
                        <span class="input-group-text" id="inputGroup-sizing-sm">Pedido: </span>
                        <input class="form-control" type="text" name="id_pedido" id="id_pedido">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Nome: </span>
                        <input class="form-control" type="text" name="nome_pedido" id="nome_pedido">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Itens/Serviço:</span>
                        <input class="form-control" type="text" name="item_pedido" id="item_pedido">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Previsão saída:</span>
                        <input class="form-control" type="date" name="previsao_saida_pedido" id="previsao_saida_pedido">
                        <input class="btn btn-primary" id="inputGroup-sizing-sm" name="Buscar" type="submit" value="Buscar">
                    </div>
                </div>
            </form>
-->
    </div>
        <div class="pedido">
            <table class="table table-striped table-hover">
                <thead class="table-secondary">
                    <th>Questão</th>
                    <th style="display: none;">Alternativa A</th>
                    <th style="display: none;">Alternativa B</th>
                    <th style="display: none;">Alternativa C</th>
                    <th style="display: none;">Alternativa D</th>
                    <th>Resposta</th>
                    <th>Opções</th>
                </thead>
                
                <tbody>
                    <?php while ($consultar_questoes = $dados_questoes->fetch_array()) { ?>
                        <tr>
                            <td><?php echo $consultar_questoes['questao']; ?></td>
                            <td><?php echo $consultar_questoes['resposta']; ?></td>
                            <td style="display: none;"><?php echo $consultar_questoes['alternativa_a']; ?></td>
                            <td style="display: none;"><?php echo $consultar_questoes['alternativa_b']; ?></td>
                            <td style="display: none;"><?php echo $consultar_questoes['alternativa_c']; ?></td>
                            <td style="display: none;"><?php echo $consultar_questoes['alternativa_d']; ?></td>
                            <td>
                                <button id=<?php echo $consultar_questoes['id'] ?> class='btn btn-outline-warning btn-sm' onclick="editQuestao(<?php echo $consultar_questoes['id']?>)">Editar</button>
                                <button id=<?php echo $consultar_questoes['id'] ?> class='btn btn-outline-danger btn-sm' onclick="apagarQuestao(<?php echo $consultar_questoes['id']?>)">Apagar</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="home.php"><button id="exibir-resposta" class="btn bd primary">Voltar</button></a>
        </div>

    <div class="footer navbar-fixed-bottom">
        <span>Desenvolvido por Amorim Systems</span>
    </div>
    </div>

    <script src="js/custom-home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>