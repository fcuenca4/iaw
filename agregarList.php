<?php


include_once './auxiliares/db.php';

if (isset($_POST['owner'])) {
    $name = $_POST['owner'];
	$db = new DB();
	$db->agregarMovie($name);
}else {
        echo 'agregar_error';
     }

?> 