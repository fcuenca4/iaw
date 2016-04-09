<?php

class DB {
    var $db;
    
    function DB(){
        $path = str_replace("auxiliares","",getcwd());
        
        $dbase = $path . '/db/movies.sqlite';
        try{
            $this->db = new PDO('sqlite:'.$dbase);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            die('Connection failed: '.$e->getMessage());
        }
         
    }
    
    function obtenerMovies($id_list){
        $columna = getColumna();
        return $this->db->query("SELECT *	
                                    FROM movies m
                                        INNER JOIN relacion_movie_list rml  ON (m.id=rml.id_movie)
                                    WHERE rml.id_list='$id_list' ORDER BY ".$columna." ".getOrder($columna))->fetchAll();
    }
    
    function obtenerLists(){
        $columna = getColumna();
        return $this->db->query("SELECT * FROM lists ORDER BY".$columna." ".getOrder($columna))->fetchAll();
    }
    
    function agregarMovie($name, $director, $rating, $seen, $link, $year) {
        return $this->db->exec("INSERT INTO movies VALUES ( null,'$name','$director','$rating','$seen','$link','$year);");
              
    }
    
    function agregarList($name){
        return $this->db->exec("INSER INTO lists VALUES (null,'$name',null);");
    }
    
    function agregarMovieInList($id_movie,$id_list){
       return $this->db->exec("INSERT INTO relacion_movie_list (null,'$id_movie','$id_list"); 
    }
            
    function eliminarList($id_list){
       $this->db->exec("DELETE FROM relacion_movie_list WHERE id_list='$id_list';");
       return $this->db->exec("DELETE FROM lists WHERE id='$id_list';");
    }
    
    function eliminarMovieInList($id_movie, $id_list){
        return $this->db->exec("DELETE FROM relacion_movie_list WHERE id_movie='$id_movie' AND id_list='$id_list';");
    }
    
    function eliminarMovie($id_movie){
       $this->db->exec("DELETE FROM relacion_movie_list WHERE id_movie='$id_movie';");
        return $this->db->exec("DELET FROM movies WHERE id='$id_movie';");
    }
}
