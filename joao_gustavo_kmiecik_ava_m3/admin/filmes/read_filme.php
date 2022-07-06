<?php
require_once('../../database.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $filme = mysqli_fetch_assoc($database->getRegister('tb_filmes', $id));
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
        <hr/>
        <br/>
        <dl class="dl-horizontal">
            <dt>Título Traduzido:</dt>
            <dd><?php echo $filme['titulo_traduzido']; ?></dd>
            <dt>Título Original:</dt>
            <dd><?php echo $filme['titulo_original']; ?></dd>
            <dt>Duração:</dt>
            <dd><?php echo $filme['duracao']; ?></dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Valor:</dt>
            <dd><?php echo $filme['valor_locacao']; ?></dd>
            <dt>Gênero:</dt>
            <dd><?php echo $filme['id_generos']; ?></dd>
        </dl>

        <div id="actions" class="row">
            <div class="col-md-12">
                <a href="update_filme.php?id=<?php echo $filme['id']; ?>" class="btn btn-primary">Editar</a>
                <a href="index.php" class="btn btn-default">Voltar</a>
            </div>
        </div>
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