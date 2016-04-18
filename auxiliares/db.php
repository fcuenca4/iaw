<?php 

class DB {
    var $db;

    function DB() {
        $path = str_replace("auxiliares", "", getcwd());

        $dbase = $path.'/db/movies.sqlite';
        try {
            $this->db = new PDO('sqlite:'.$dbase);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            die('Connection failed: '.$e->getMessage());
        }

    }

    function obtenerMovies($id_list) {
        $columna = getColumna();
        return $this->db->query("SELECT *	
                                    FROM movies m INNER JOIN relacion_movie_list rml  
                                                 ON (m.id=rml.id_movie)
                                                    WHERE rml.id_list='$id_list' 
                                                        ORDER BY ".$columna." ".getOrder($columna))->fetchAll();
    }

    function obtenerMovie($id_movie, $id_list) {
        return $this->db->query("SELECT *
									FROM movies m 
									INNER JOIN relacion_movie_list rml  ON (m.id=rml.id_movie)
									WHERE (rml.id_list='$id_list' AND m.id='$id_movie')")->fetchAll();
    }

    function obtenerLists() {
        $columna = getColumna2();
        return $this->db->query("SELECT * FROM list ORDER BY ".$columna." ".getOrder($columna))->fetchAll();
    }

    function getVisto($idMovie, $idList) {

        return $this->db->query("SELECT seen FROM relacion_movie_list 
                                            WHERE (relacion_movie_list.id_movie = '$idMovie' and
                                                 relacion_movie_list.id_list=$idList)")->fetchAll();

    }

    function setVisto($idMovie, $idList, $seen) {

        return $this->db->exec("UPDATE relacion_movie_list  
                                      SET seen='$seen' 
                                            WHERE 
                                            ( relacion_movie_list.id_movie = '$idMovie' and
                                                 relacion_movie_list.id_list=$idList )");
    }

    function agregarMovie($id_list, $name, $director, $rating, $link, $year, $seen) {
        $this->db->exec("INSERT INTO movies 
                            VALUES (null,'$name', '$director', '$rating', '$link', '$year');");
        $id_movie = $this->db->query("SELECT id
										FROM movies 
										ORDER BY id DESC
										LIMIT 1;")->fetch();

        return $this->db->exec("INSERT INTO relacion_movie_list
                                     VALUES  ('$id_movie[0]','$id_list','$seen'); ");

    }

    function agregarList() {
         $this->db->exec("INSERT INTO list VALUES (null,'prueba');");
         return $this->db->query("SELECT id
										FROM list 
										ORDER BY id DESC
										LIMIT 1;")->fetch()[0];
    }

    function agregarMovieInList($id_movie, $id_list) {
        return $this->db->exec("INSERT INTO relacion_movie_list (null,'$id_movie','$id_list");
    }

    function eliminarList($id_list) {
        $this->db->exec("DELETE FROM relacion_movie_list WHERE id_list='$id_list';");
        return $this->db->exec("DELETE FROM lists WHERE id='$id_list';");
    }

    function eliminarMovie($id_movie, $id_list) {
        return $this->db->exec("DELETE FROM relacion_movie_list WHERE id_movie='$id_movie' AND id_list='$id_list';");
    }

    function existeLista($id_list) {
        return $this->db->query("SELECT COUNT(*) FROM list WHERE list.id='$id_list' LIMIT 1;")->fetchColumn();
      
    }
	
	function editarMovie($id, $director, $name,$year,$rating, $link) {
      
        return $this->db->exec("UPDATE movies SET director='$director', name='$name',year=$year,rating=$rating, link=$link WHERE id='$id';");
    }
 





}