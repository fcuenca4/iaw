<?php 

include_once './auxiliares/db.php';

if (isset($_POST['id_movie'])) {
    $id_movie = $_POST['id_movie'];
    $director = $_POST['director'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $id_list = $_POST['id_list'];
    $rating = $_POST['rating'];
    $link = $_POST['link'];
    $db = new DB();
    $resultado = $db->editarMovie($id_movie, $director, $name, $year, $rating, $link);

} else {
    echo 'guardar_modificacion_error';
}
header("Location: ./index.php?list=$id_list");
die();


?>