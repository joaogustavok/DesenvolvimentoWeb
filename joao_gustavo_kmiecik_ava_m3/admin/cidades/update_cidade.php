<?php
require_once('../../database.php');
$estados = $database->read('tb_estados');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST) & !empty($_POST)) {
        $cidade['nome'] = $database->sanitize($_POST['nome']);
        $cidade['abreviatura'] = $database->sanitize($_POST['abreviatura']);
        $cidade['id_estado'] = $database->sanitize($_POST['id_estado']);

        $res = $database->update('tb_cidades', 'id', $id, $cidade);
        if ($res) {
            header('location: index.php');
        } else {
            echo "failed to insert data";
        }
    } else {
        $cidade = mysqli_fetch_assoc($database->getRegister('tb_cidades', $id));
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

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../filmes/index.php">Web Locadora</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../filmes/index.php">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../generos/index.php">Gêneros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../clientes/index.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../funcionarios/index.php">Funcionarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../cidades/index.php">Cidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../estados/index.php">Estados</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <!-- criando a área central -->
    <main class="container text-center">
        <br/>
        <hr/>
        <h1 class="text-center">Atualizar a Cidade</h1>
        <hr/>
        <!-- iniciando o formulário -->
        <form action="update_cidade.php?id=<?php echo $cidade['id']; ?>" id="formAlterarCidade" method="post"
        <div class="container">
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-row justify-content-center align-items-center">
                        <div class="form-group col-md-6">
                            <label for="inputNome">NomeL>:</label>
                            <input type="text" class="form-control" id="inputNome" name="nome"
                                   value="<?php echo $cidade['nome']; ?>"
                                   required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputSigla">Sigla:</label>
                            <input type="text" class="form-control" id="inputAbreviatura" name="abreviatura"
                                   value="<?php echo $cidade['abreviatura']; ?>"
                                   required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDuracao">Região:</label>
                            <input type="text" class="form-control" id="inputDuracao" name="regiao"
                                   value="<?php echo $cidade['regiao']; ?>"
                                   required>
                        </div>
                        <div class="col-md-12">
                            <div class="form-row justify-content-center align-items-center">
                                <div class="form-group col-md-6">
                                    <label for="id_estado" data-error="wrong" data-succes="right">Estado
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
