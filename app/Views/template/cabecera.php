<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <nav>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=base_url('listar')?>">Listar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('crear')?>">Crear</a>
            </li>

        </ul>
    </nav>

<div class="container"> 

<?php if(session('mensaje')) { ?>

<div class="alert alert-danger" role="alert">
    <?php
    echo session('mensaje')
    ?>
</div>

<?php 
}
?>