<?php


include_once './auxiliares/db.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $director = $_POST['director'];
    $rating = $_POST['rating'];
    $link = $_POST['link'];
	$year = $_POST['year'];
    $idList= $_POST['idList'];
    $db = new DB();
    $db->agregarMovie($idList,$name, $director, $rating, $link,$year);
}
else {
        echo 'agregar_error';}

    header("Location: ./");
    die();


?> 