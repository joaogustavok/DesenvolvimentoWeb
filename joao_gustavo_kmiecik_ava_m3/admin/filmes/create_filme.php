<?php
require_once('../../database.php');
$generos = $database->read('tb_generos');
if (isset($_POST) & !empty($_POST)) {
    $filmes['titulo_traduzido'] = $database->sanitize($_POST['titulo_traduzido']);
    $filmes['titulo_original'] = $database->sanitize($_POST['titulo_original']);
    $filmes['duracao'] = $database->sanitize($_POST['duracao']);
    $filmes['valor_locacao'] = $database->sanitize($_POST['valor_locacao']);
    $filmes['id_generos'] = $database->sanitize($_POST['id_generos']);


    $res = $database->create('tb_filmes', $filmes);
    if ($res) {
        header('location: index.php');
        //echo "Successfully inserted data";
    } else {
        echo "failed to insert data";
    }
}
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <!-- PAGE INFO -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>LocadoraWeb</title>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"/>
    <!-- JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<div class="container">
    <!-- criando a área central -->
    <main class="container text-center">
        <br/>
        <hr/>
        <h1 class="text-center">Cadastrar Novo Filme</h1>
        <hr/>
        <!-- iniciando o formulário -->
        <form action="create_filme.php" id="formCadastroFilme" method="post" class="needs-validation" novalidate>
            <div class="container">
                <div class="col-md-12">
                    <div class="form-row justify-content-center align-items-center">
                        <div class="form-group col-md-6">
                            <label for="inputTituloTraduzido">Titulo Traduzido</label>
                            <input type="text" class="form-control" id="inputTituloTraduzido" name="titulo_traduzido" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTituloOriginal">Titulo Original</label>
                            <input type="text" class="form-control" id="inputTituloOriginal" name="titulo_original" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDuracao">Duração:</label>
                            <input type="number" class="form-control" id="inputDuracao" name="duracao" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputValor">Valor:</label>
                            <input type="number" class="form-control" id="inputValor" name="valor_locacao" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-row justify-content-center align-items-center">
                            <div class="form-group col-md-6">
                                <label for="id_generos" data-error="wrong" data-succes="right">Gênero</label>
                                <label>
                                    <select class="form-select" name="id_generos">
                                        <?php if ($generos) : ?>
                                            <?php foreach ($generos as $genero) : ?>
                                                <option value="<?php echo $genero['id']; ?>">
                                                    <?php echo $genero['nome']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option>Não foi possível obter os dados do banco!</option>
                                        <?php endif; ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-12" style="text-align:right;">
                        <a href="index.php" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- finalizando o formulário -->
        <hr/>
        <br/>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
</body>

</html>
