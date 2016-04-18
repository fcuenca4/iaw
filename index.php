<?php 
include_once './auxiliares/db.php';
include_once './auxiliares/orden.php';


function getColumnas() {
    $columnas = array("id", "name", "director", "rating", "link", "year");
    $result = array();

    foreach($columnas as $columna) {
        $mov = $columna;
        $orden = getOrden($columna);
        $list_id=$_GET['list'];
        $ordenUrl = "./?list=".$list_id."&col=".$columna."&ord=".$orden;
        array_push($result, crearColumna($mov, $ordenUrl));

    }
    return $result;
}

function crearColumna($nombre, $ordenUrl) {
    return array('nombre' => $nombre, 'OrdenUrl' => $ordenUrl);
}

function getListbyURL() {
    $db = new DB();
    if (isset($_GET['list'])) {
        $id_lista = $_GET['list'];
        $resultado = $db->existeLista($id_lista);
        if ($resultado) {
            return $id_lista;
        } else {
            $resultado = $db->agregarList();
            return $resultado;
        }

    } else {
        return $db->agregarList();
    }
}


function getMovies($id_list) {
    $db = new DB();
    $movies = $db->obtenerMovies($id_list);
    $result = array();
    $aux = array();
    foreach($movies as $movie) {
        $file = "avatar/".$movie[0].".jpg";
        $aux = $db->getVisto($movie[0], $id_list)[0]["seen"]; //1 si la pelicula del usuario fue vista, 0 caso contrario
        if (!file_exists($file)) $file = './avatar/no.jpg';
        $deleteUrl = './borrarPelicula.php?idMovie='.$movie[0].'&idList='.$id_list;
		$editUrl =  './editarPelicula.php?idMovie=' . $movie[0] .'&idList='.$id_list;
        array_push($result,
        array('id' => $movie[0], 'name' => $movie[1], 'director' => $movie[2], 'rating' => $movie[3], 'link' => $movie[4], 'seen' => $aux, 'year' => $movie[5], 'avatar' => $file, 'deleteUrl' => $deleteUrl, 'editUrl'=>$editUrl ));
    }
    return $result;
}



include './root.html';
?>