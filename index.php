<?php 
include_once './auxiliares/db.php';
include_once './auxiliares/orden.php';

function getColumnas() {
    $columnas = array("id", "name", "director", "rating", "link", "year");
    $result = array();

    foreach($columnas as $columna) {
        $mov = $columna;
        $orden = getOrden($columna);
        $ordenUrl = "./?col=".$columna."&ord=".$orden;
        array_push($result, crearColumna($mov, $ordenUrl));

    }
    return $result;
}

function crearColumna($nombre, $ordenUrl) {
    return array('nombre' => $nombre, 'OrdenUrl' => $ordenUrl);
}



function getMovies($id_list) {
    $db = new DB();
    $movies = $db->obtenerMovies($id_list);
    $result = array();
    $aux = array();
    foreach($movies as $movie) {
        $file = "avatar/".$movie[0].".jpg";
        $aux = $db->getVisto($movie[0], $id_list)[0]["seen"]; //1 si la pelicula del usuario fue vista, 0 caso contrario
        if (!file_exists($file)) $file = '/avatar/no.jpg';
        array_push($result, array('id' => $movie[0], 'name' => $movie[1], 'director' => $movie[2], 'rating' => $movie[3], 'link' => $movie[4], 'seen' => $aux, 'year' => $movie[5], 'avatar' => $file));
    }
    return $result;
}
include './root.html';
?>