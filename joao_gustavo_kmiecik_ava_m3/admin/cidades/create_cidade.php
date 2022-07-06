<?php
require_once('../../database.php');
$estados = $database->read('tb_estados');
if (isset($_POST) & !empty($_POST)) {
    $cidades['nome'] = $database->sanitize($_POST['nome']);
    $cidades['abreviatura'] = $database->sanitize($_POST['abreviatura']);
    $cidades['id_estado'] = $database->sanitize($_POST['id_estado']);

    $res = $database->create('tb_estados', $cidades);
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
        <h1 class="text-center">Cadastrar Novo Cidade</h1>
        <hr/>
        <!-- iniciando o formulário -->
        <form action="create_estado.php" id="formCadastroFilme" method="post" class="needs-validation" novalidate>
            <div class="container">
                <div class="col-md-12">
                    <div class="form-row justify-content-center align-items-center">
                        <div class="form-group col-md-6">
                            <label for="inputNome">Nome:</label>
                            <input type="text" class="form-control" id="inputNome" name="nome" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAbreviatura">Abreviatura:</label>
                            <input type="text" class="form-control" id="inputAbreviatura" name="abreviatura" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_estado" data-error="wrong" data-succes="right">Estado</label>
                            <label>
                                <select class="form-select" name="id_estado">
                                    <?php if ($estados) : ?>
                                        <?php foreach ($estados as $estado) : ?>
                                            <option value="<?php echo $estado['id']; ?>">
                                                <?php echo $estado['nome']; ?>
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