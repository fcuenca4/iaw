<?php


include_once './auxiliares/db.php';

if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $db = new DB();
    $db->agregarList($nombre);
}

redirect("./");

?> 
