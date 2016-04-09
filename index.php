<?php
    include_once './auxiliares/db.php';
    include_once './auxiliares/orden.php';
    
    function getColumnas(){
        $columnas = array("id","name","director","rating","seen","link","year");
        $result = array();
        
        foreach($columnas as $columna){
            $mov = $columna;
            $orden = getOrden($columna);
            $ordenUrl = "./?col=".$columna."&ord=".$orden;
            array_push($result, crearColumna($mov,$ordenUrl));
            
        }
        return $result;
    }
    
    function crearColumna($nombre,$ordenUrl){
        return array('nombre'=>$nombre, 'OrdenUrl'=>$ordenUrl);
    }
    
    
    
      function getMovies($id_list){
        $db = new DB();
        $movies = $db->obtenerMovies($id_list);
        $result = array();
        
        
        foreach ($movies as $movie){
             $file = "avatar/" . $movie[0] . ".jpg";
                if (!file_exists($file))
            $file = '/fotos/nopicture.jpg';
            array_push($result, array(
                'id'=>$movie[0], 
                'name'=> $movie[1],
                'director'=> $movie[2],
                'rating'=> $movie[3],
                'seen'=> $movie[4],
                'link'=> $movie[5],
                'year'=> $movie[6],
                'avatar'=> $file
            ));
        }
        return $result;
    }
    include './root.html';
?>
