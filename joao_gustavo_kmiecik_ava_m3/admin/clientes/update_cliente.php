<?php
require_once('../../database.php');
$estados = $database->read('tb_estados');
$cidades = $database->read('tb_cidades');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST) & !empty($_POST)) {
        $cliente['nome'] = $database->sanitize($_POST['nome']);
        $cliente['nascimento'] = $database->sanitize($_POST['nascimento']);
        $cliente['genero'] = $database->sanitize($_POST['genero']);
        $cliente['estadocivil'] = $database->sanitize($_POST['estadocivil']);
        $cliente['fone'] = $database->sanitize($_POST['fone']);
        $cliente['cel'] = $database->sanitize($_POST['cel']);
        $cliente['email'] = $database->sanitize($_POST['email']);
        $cliente['rua'] = $database->sanitize($_POST['rua']);
        $cliente['num'] = $database->sanitize($_POST['num']);
        $cliente['comp'] = $database->sanitize($_POST['comp']);
        $cliente['bairro'] = $database->sanitize($_POST['bairro']);
        $cliente['cep'] = $database->sanitize($_POST['cep']);
        $cliente['id_cidade'] = $database->sanitize($_POST['id_cidade']);
        $cliente['id_uf'] = $database->sanitize($_POST['id_uf']);

        $res = $database->update('tb_clientes', 'id', $id, $cliente);
        if ($res) {
            header('location: index.php');
        } else {
            echo "failed to insert data";
        }
    } else {
        $cliente = mysqli_fetch_assoc($database->getRegister('tb_clientes', $id));
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
        <h1 class="text-center">Atualizar o cliente</h1>
        <hr/>
        <!-- iniciando o formulário -->
        <form action="update_cliente.php?id=<?php echo $cliente['id']; ?>" id="formAlterarCliente" method="post"
        <div class="container">
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome:</label>
                        <input type="text" class="form-control" id="inputNome" name="nome"
                               value="<?php echo $cliente['nome']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNascimento">Data Nascimento:</label>
                        <input type="date" class="form-control" id="inputNascimento" name="nascimento"
                               value="<?php echo $cliente['nascimento']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGenero">Genero:</label>
                        <input type="text" class="form-control" id="inputGenero" name="genero"
                               value="<?php echo $cliente['genero']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEstadoCivil">Estado Civil:</label>
                        <input type="text" class="form-control" id="inputEstadoCivil" name="estadocivil"
                               value="<?php echo $cliente['estadocivil']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFone">Telefone:</label>
                        <input type="text" class="form-control" id="inputFone" name="fone"
                               value="<?php echo $cliente['fone']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCel">Celular:</label>
                        <input type="text" class="form-control" id="inputCel" name="cel"
                               value="<?php echo $cliente['cel']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email:</label>
                        <input type="email" class="form-control" id="inputEmail" name="email"
                               value="<?php echo $cliente['email']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputRua">Rua:</label>
                        <input type="text" class="form-control" id="inputRua" name="rua"
                               value="<?php echo $cliente['rua']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNum">Numero:</label>
                        <input type="number" class="form-control" id="inputNum" name="num"
                               value="<?php echo $cliente['num']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputComp">Complemento:</label>
                        <input type="text" class="form-control" id="inputComp" name="comp"
                               value="<?php echo $cliente['comp']; ?>"
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputBairro">Bairro:</label>
                        <input type="text" class="form-control" id="inputBairro" name="bairro"
                               value="<?php echo $cliente['bairro']; ?>"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCep">Cep:</label>
                        <input type="text" class="form-control" id="inputCep" name="cep"
                               value="<?php echo $cliente['cep']; ?>"
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
