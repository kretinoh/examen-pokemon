<?php
include 'lib/lib.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Examen Rafael Maestre</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div id="content">
    <h1>Partidos del equipo Pokemon.</h1>
    <p>Página principal de compra de entradas del equipo Pokemon.</p><br><br>
    <form action="index.php" method="post">
        <label for="equipoVisitante" id="teams">Equipo Visitante:
            <select name="equipoVisitante">
                <option value="Picapiedras">Picapiedras</option>
                <option value="Roedores">Roedores</option>
                <option value="Perezosos">Perezosos</option>
                <option value="Invisibles">Invisibles</option>
                <option value="Legendarios">Legendarios</option>
                <option value="Magos">Magos</option>
                <option value="Sultanes">Sultanes</option>
            </select>
        </label>
        <br>
        <label for="radioZona">Zona:<br>
            A:<input type="radio" name="zona" value="zona-a">
            B:<input type="radio" name="zona" value="zona-b">
            C:<input type="radio" name="zona" value="zona-c">
            D:<input type="radio" name="zona" value="zona-d">
        </label>
        <br>
        <input id="mostrar" type="submit" value="Mostrar Zona" name="mostrar">
    </form>
    <?php

    if (isset($_POST['mostrar'])) {
        if (!isset($_POST['zona'])) {
            echo '<p id="messageError">Debe seleccionar una zona</p>';
            exit;
        } else {
            echo '<form action="index.php" method="post">';
            echo '<input type="hidden" name="zona" value="' . $_POST['zona'] . '">';
            echo '<input type="hidden" name="equipoVisitante" value="' . $_POST['equipoVisitante'] . '">';
            if ($_POST['zona'] === 'zona-a') {
                getAsientos(0, 99, $asientos, $_POST['equipoVisitante'], $_POST['zona']);
            } elseif ($_POST['zona'] === 'zona-b') {
                getAsientos(100, 199, $asientos, $_POST['equipoVisitante'], $_POST['zona']);
            } elseif ($_POST['zona'] === 'zona-c') {
                getAsientos(200, 299, $asientos, $_POST['equipoVisitante'], $_POST['zona']);
            } elseif ($_POST['zona'] === 'zona-d') {
                getAsientos(300, 399, $asientos, $_POST['equipoVisitante'], $_POST['zona']);
            }
        }
    }
    if (isset($_POST['comprar'])) {
        if (!isset($_POST['entradas'])) {
            $_POST['entradas'] = null;
            echo '<p id="messageError">Debe seleccionar al menos una entrada</p>';
            exit;
        } else {
            realizarCompra($_POST['equipoVisitante'], $_POST['zona'], $asientos);
        }
    }
    ?>
</div>

