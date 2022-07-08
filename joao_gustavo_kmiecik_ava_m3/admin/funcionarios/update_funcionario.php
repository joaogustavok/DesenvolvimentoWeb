<?php
require_once('../../database.php');
$estados = $database->read('tb_estados');
$cidades = $database->read('tb_cidades');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST) & !empty($_POST)) {
        $funcionarios['nome'] = $database->sanitize($_POST['nome']);
        $funcionarios['nascimento'] = $database->sanitize($_POST['nascimento']);
        $funcionarios['genero'] = $database->sanitize($_POST['genero']);
        $funcionarios['estadocivil'] = $database->sanitize($_POST['estadocivil']);
        $funcionarios['cel'] = $database->sanitize($_POST['cel']);
        $funcionarios['email'] = $database->sanitize($_POST['email']);
        $funcionarios['dataadmissao'] = $database->sanitize($_POST['dataadmissao']);
        $funcionarios['cargo'] = $database->sanitize($_POST['cargo']);
        $funcionarios['salario'] = $database->sanitize($_POST['salario']);
        $funcionarios['id_cidade'] = $database->sanitize($_POST['id_cidade']);
        $funcionarios['id_uf'] = $database->sanitize($_POST['id_uf']);

        $res = $database->update('tb_funcionarios', 'id', $id, $funcionarios);
        if ($res) {
            header('location: index.php');
        } else {
            echo "failed to insert data";
        }
    } else {
        $funcionario = mysqli_fetch_assoc($database->getRegister('tb_funcionarios', $id));
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
        <h1 class="text-center">Atualizar a Cidade</h1>
        <hr/>
        <!-- iniciando o formulário -->
        <form action="update_funcionario.php?id=<?php echo $funcionario['id']; ?>" id="formAlterarfuncionario"
              method="post"
        <div class="container">
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome:</label>
                        <input type="text" class="form-control" id="inputNome" name="nome"
                               value="<?php echo $funcionario['nome']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNascimento">Data Nascimento:</label>
                        <input type="date" class="form-control" id="inputNascimento" name="nascimento"
                               value="<?php echo $funcionario['nascimento']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGenero">Genero:</label>
                        <input type="text" class="form-control" id="inputGenero" name="genero"
                               value="<?php echo $funcionario['genero']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEstadoCivil">Estado Civil:</label>
                        <input type="text" class="form-control" id="inputEstadoCivil" name="estadocivil"
                               value="<?php echo $funcionario['estadocivil']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCel">Celular:</label>
                        <input type="text" class="form-control" id="inputCel" name="cel"
                               value="<?php echo $funcionario['cel']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email:</label>
                        <input type="email" class="form-control" id="inputEmail" name="email"
                               value="<?php echo $funcionario['email']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDataadmissao">Data Admissão:</label>
                        <input type="date" class="form-control" id="inputDataadmissao" name="dataadmissao"
                               value="<?php echo $funcionario['dataadmissao']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCargo">Cargo:</label>
                        <input type="text" class="form-control" id="inputCargo" name="cargo"
                               value="<?php echo $funcionario['cargo']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputSalario">Salario:</label>
                        <input type="number" class="form-control" id="inputSalario" name="salario"
                               value="<?php echo $funcionario['salario']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="id_cidade" data-error="wrong" data-succes="right">Cidade:</label>
                        <select class="form-select" name="id_cidade">
                            <?php if ($cidades) : ?>
                                <?php foreach ($cidades as $cidade) : ?>
                                    <option value="<?php echo $cidade['id']; ?>">
                                        <?php echo $cidade['nome']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <option>Não foi possível obter os dados do banco!</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="id_uf" data-error="wrong" data-succes="right">UF:</label>
                        <select class="form-select" name="id_uf">
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
