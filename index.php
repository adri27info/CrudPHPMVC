<?php

require_once("controlador/controlador.php");

if (isset($_GET['metodo'])) {
    $metodo =  $_GET['metodo'];
    if (method_exists(Controlador::class, $metodo)) {
        if (isset($_GET["id"])) Controlador::{$metodo}($_GET["id"]);
        else Controlador::{$metodo}();
    } else {
        header("Location: index.php");
    }
} else {
    Controlador::index();
}

Controlador::exitConnection();
