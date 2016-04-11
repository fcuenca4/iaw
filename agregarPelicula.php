<?php


include_once './auxiliares/db.php';

if (isset($_POST['agregar'])) {
    $name = $_POST['name'];
    $director = $_POST['director'];
    $rating = $_POST['rating'];
    $seen = $_POST['seen'];
    $link = $_POST['link'];
	$year = $_POST['year'];
    $db = new DB();
    $db->agregarMovie($name, $director, $rating, $seen, $link,$year);
}

redirect("./");

?> 