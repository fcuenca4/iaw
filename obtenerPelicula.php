<?php
include_once './auxiliares/db.php';
	
	$error = null;
	$db = new DB();
    $id_movie = $_GET['idMovie'];
	$id_list = $_GET['idList'];
	
    $movie = $db->obtenerMovie($id_movie,$id_list);
	$mov = $movie[0];
	
	
	$test = array('name' => $mov['name'], 'rating' => $mov['rating'], 'link' => $mov['link'], 'year' => $mov['year'],'director' => $mov['director']);
	echo json_encode($test);
?>
	
	

     

    