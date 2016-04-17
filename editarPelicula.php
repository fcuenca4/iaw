<?php

include_once './auxiliares/db.php';


	$error = null;
	$db = new DB();
	

    $id = $_GET['idMovie'];
	$id_list = $_GET['idList'];
    $movie = $db->obtenerMovie($id,$id_list);
	$mov = $movie[0];
	
	include './formularioEditar.html';
	
	?>