<?php
require_once('../../database.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $cliente = mysqli_fetch_assoc($database->getRegister('tb_clientes', $id));
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
            <dt>Nome:</dt>
            <dd><?php echo $cliente['nome']; ?></dd>
            <dt>Data Nascimento:</dt>
            <dd><?php echo $cliente['nascimento']; ?></dd>
            <dt>Gênero:</dt>
            <dd><?php echo $cliente['genero']; ?></dd>
            <dt>Estado Civil:</dt>
            <dd><?php echo $cliente['estadocivil']; ?></dd>
            <dt>Telefone:</dt>
            <dd><?php echo $cliente['fone']; ?></dd>
            <dt>Celular:</dt>
            <dd><?php echo $cliente['cel']; ?></dd>
            <dt>Email:</dt>
            <dd><?php echo $cliente['email']; ?></dd>
            <dt>Rua:</dt>
            <dd><?php echo $cliente['rua']; ?></dd>
            <dt>Número:</dt>
            <dd><?php echo $cliente['num']; ?></dd>
            <dt>Complemento:</dt>
            <dd><?php echo $cliente['comp']; ?></dd>
            <dt>Bairro:</dt>
            <dd><?php echo $cliente['bairro']; ?></dd>
            <dt>Cep:</dt>
            <dd><?php echo $cliente['cep']; ?></dd>
            <dt>Cidade:</dt>
            <dd><?php echo $cliente['id_cidade']; ?></dd>
            <dt>UF:</dt>
            <dd><?php echo $cliente['id_uf']; ?></dd>
        </dl>
        <div id="actions" class="row">
            <div class="col-md-12">
                <a href="update_cliente.php?id=<?php echo $cliente['id']; ?>" class="btn btn-primary">Editar</a>
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