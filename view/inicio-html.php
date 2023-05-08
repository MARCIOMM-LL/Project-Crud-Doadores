<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $titulo ?? 'Armazenamento de Objetos'; ?></title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lista De Opções
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item bg-blue" href="/listar-doadores">Doadores</a>
            </div>
        </div>

        <form class="d-flex">
            <input class="form-control me-2 mr-2" type="search" placeholder="Procurar" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Procurar</button>
        </form>
    </div>
</nav>

<div class="container">
    <?php if (isset($_SESSION['mensagem_flash'])): ?>
        <div class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>">
            <?= $_SESSION['mensagem_flash']; ?>
        </div>
    <?php
        unset($_SESSION['mensagem_flash']);
        unset($_SESSION['tipo_mensagem']);
    endif; ?>