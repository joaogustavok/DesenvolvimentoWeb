<?php
require_once('../../database.php');
$cidades = $database->read('tb_cidades');
$estados = $database->read('tb_estados');
if (isset($_POST) & !empty($_POST)) {
    $clientes['nome'] = $database->sanitize($_POST['nome']);
    $clientes['nascimento'] = $database->sanitize($_POST['nascimento']);
    $clientes['genero'] = $database->sanitize($_POST['genero']);
    $clientes['estadocivil'] = $database->sanitize($_POST['estadocivil']);
    $clientes['fone'] = $database->sanitize($_POST['fone']);
    $clientes['cel'] = $database->sanitize($_POST['cel']);
    $clientes['email'] = $database->sanitize($_POST['email']);
    $clientes['rua'] = $database->sanitize($_POST['rua']);
    $clientes['num'] = $database->sanitize($_POST['num']);
    $clientes['comp'] = $database->sanitize($_POST['comp']);
    $clientes['bairro'] = $database->sanitize($_POST['bairro']);
    $clientes['cep'] = $database->sanitize($_POST['cep']);
    $clientes['id_cidade'] = $database->sanitize($_POST['id_cidade']);
    $clientes['id_uf'] = $database->sanitize($_POST['id_uf']);

    $res = $database->create('tb_clientes', $clientes);
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
        <h1 class="text-center">Cadastrar Novo Cliente</h1>
        <hr/>
        <!-- iniciando o formulário -->
        <form action="create_cliente.php" id="formCadastroCliente" method="post" class="needs-validation" novalidate>
            <div class="container">
                <div class="col-md-12">
                    <div class="form-row justify-content-center align-items-center">
                        <div class="form-group col-md-6">
                            <label for="inputNome">Nome:</label>
                            <input type="text" class="form-control" id="inputNome" name="nome" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNascimento">Data Nascimento:</label>
                            <input type="date" class="form-control" id="inputNascimento" name="nascimento" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputGenero">Genero:</label>
                            <input type="text" class="form-control" id="inputGenero" name="genero" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEstadoCivil">Estado Civil:</label>
                            <input type="text" class="form-control" id="inputEstadoCivil" name="estadocivil" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputFone">Telefone:</label>
                            <input type="text" class="form-control" id="inputFone" name="fone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCel">Celular:</label>
                            <input type="text" class="form-control" id="inputCel" name="cel">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email:</label>
                            <input type="email" class="form-control" id="inputEmail" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputRua">Rua:</label>
                            <input type="text" class="form-control" id="inputRua" name="rua" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNum">Numero:</label>
                            <input type="number" class="form-control" id="inputNum" name="num" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputComp">Complemento:</label>
                            <input type="text" class="form-control" id="inputComp" name="comp">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputBairro">Bairro:</label>
                            <input type="text" class="form-control" id="inputBairro" name="bairro" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCep">Cep:</label>
                            <input type="text" class="form-control" id="inputCep" name="cep" required>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
</body>

</html>
