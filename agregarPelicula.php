<?php


include_once './auxiliares/db.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $seen= $_POST['seen'];
    $director = $_POST['director'];
    $rating = $_POST['rating'];
    $link = $_POST['link'];
	$year = $_POST['year'];
    $id_lista= $_POST['id_lista'];
    $db = new DB();
    $db->agregarMovie($id_lista,$name, $director, $rating, $link,$year,$seen);
    
}
else {
        echo 'agregar_error';
     }
     header("Location: ./");
     die();


?> 