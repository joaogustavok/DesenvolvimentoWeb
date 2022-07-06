<?php
require_once('../../database.php');
$generos = $database->read('tb_generos');
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <!-- PAGE INFO -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LocadoraWeb</title>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" />
    <!-- JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <!-- criando a área central -->
    <main class="container text-center">
        <hr />
        <br />
        <div class="row">
            <div class="col-sm-6">
                <h2>Gêneros</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-info" href="create_genero.php"><i class="fa fa-plus"></i>Novo Gênero</a>
                <a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
            </div>
        </div>
        <br />
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th style="text-align:center">Opções</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($generos)) : ?>
                <tr>
                    <td colspan="4">Nenhum registro encontrado!</td>
                </tr>
            <?php else : ?>
                <?php foreach ($generos as $genero) : ?>
                    <tr>
                        <td><?php echo $genero['id'] ?></td>
                        <td><?php echo $genero['nome'] ?></td>
                        <td class="actions">
                            <a href="read_genero.php?id=<?php echo $genero['id']; ?>" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="update_genero.php?id=<?php echo $genero['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="update_genero.php?id=<?php echo $genero['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>
