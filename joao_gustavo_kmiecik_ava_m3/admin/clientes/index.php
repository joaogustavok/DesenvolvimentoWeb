<?php
require_once('../../database.php');
$clientes = $database->read('tb_clientes');
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
        <hr/>
        <br/>
        <div class="row">
            <div class="col-sm-6">
                <h2>Clientes</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-info" href="create_cliente.php"><i class="fa fa-plus"></i>Novo Cliente</a>
                <a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
            </div>
        </div>
        <br/>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nascimento</th>
                <th>Gênero</th>
                <th>Estado Civil</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cep</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th style="text-align:center">Opções</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($clientes)) : ?>
                <tr>
                    <td colspan="4">Nenhum registro encontrado!</td>
                </tr>
            <?php else : ?>
                <?php foreach ($clientes as $cliente) : ?>
                    <tr>
                        <td><?php echo $cliente['id'] ?></td>
                        <td><?php echo $cliente['nome'] ?></td>
                        <td><?php echo $cliente['nascimento'] ?></td>
                        <td><?php echo $cliente['genero'] ?></td>
                        <td><?php echo $cliente['estadocivil'] ?></td>
                        <td><?php echo $cliente['fone'] ?></td>
                        <td><?php echo $cliente['cel'] ?></td>
                        <td><?php echo $cliente['email'] ?></td>
                        <td><?php echo $cliente['rua'] ?></td>
                        <td><?php echo $cliente['num'] ?></td>
                        <td><?php echo $cliente['comp'] ?></td>
                        <td><?php echo $cliente['bairro'] ?></td>
                        <td><?php echo $cliente['cep'] ?></td>
                        <td><?php echo $cliente['id_cidade'] ?></td>
                        <td><?php echo $cliente['id_uf'] ?></td>

                        <td class="actions">
                            <a href="read_cliente.php?id=<?php echo $cliente['id']; ?>" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="update_cliente.php?id=<?php echo $cliente['id']; ?>"
                               class="btn btn-sm btn-warning">Editar</a>
                            <a href="delete_cliente.php?id=<?php echo $cliente['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <hr/>
    </main>
</div>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
</body>

</html>
