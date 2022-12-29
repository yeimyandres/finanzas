<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Finanzas Personales</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
     integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.1/css/fixedHeader.dataTables.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Finanzas Personales</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('cuentas')?>">Cuentas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('rubros')?>">Rubros</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('programados')?>">Programado</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('ejecutados')?>">Ejecutado</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('balance')?>">Balance</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('cerrarperiodo')?>">Cerrar Periodo</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">

    <?php
        if(session('mensaje')){
    ?>

    <div class="alert alert-danger" role="alert">
        <?php
            echo session('mensaje');
        ?>
    </div>

    <?php
        }
    ?>