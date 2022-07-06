<?php
require_once('../../database.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST) & !empty($_POST)) {
        $estado['nome'] = $database->sanitize($_POST['nome']);
        $estado['sigla'] = $database->sanitize($_POST['sigla']);
        $estado['regiao'] = $database->sanitize($_POST['regiao']);

        $res = $database->update('tb_estados', 'id', $id, $estado);
        if ($res) {
            header('location: index.php');
        } else {
            echo "failed to insert data";
        }
    } else {
        $estado = mysqli_fetch_assoc($database->getRegister('tb_estados', $id));
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
<body>

<div class="container">
    <!-- criando a área central -->
    <main class="container text-center">
        <br/>
        <hr/>
        <h1 class="text-center">Atualizar o Estado</h1>
        <hr/>
        <!-- iniciando o formulário -->
        <form action="update_estado.php?id=<?php echo $estado['id']; ?>" id="formAlterarFilme" method="post"
        <div class="container">
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-row justify-content-center align-items-center">
                        <div class="form-group col-md-6">
                            <label for="inputNome">Nome:</label>
                            <input type="text" class="form-control" id="inputNome" name="nome"
                                   value="<?php echo $estado['nome']; ?>"
                                   required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputSigla">Sigla:</label>
                            <input type="text" class="form-control" id="inputSigla" name="sigla"
                                   value="<?php echo $estado['sigla']; ?>"
                                   required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDuracao">Região:</label>
                            <input type="text" class="form-control" id="inputDuracao" name="regiao"
                                   value="<?php echo $estado['regiao']; ?>"
                                   required>
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


<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
</body>

</html>
