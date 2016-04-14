<?php
include_once './auxiliares/db.php';

$resultado = 0;
$id_movie= '';
print_r($_GET); //ME TIRA QUE NO HAY NADA 
if (isset($_GET['idMovie'])) {
    $id_movie = $_GET['idMovie'];
    $id_lista= $_GET['idList'];
    $db = new DB();
    $resultado=$db->eliminarMovie($id_movie, $id_lista );
	 
}else {
    echo "error en borrar pelicula";
}
Header ( "Content-type: text/xml" ); 	
echo "<resultado>";
echo " <id>". $id_movie."</id>";
echo " <eliminado>".$resultado."</eliminado>";
echo "</resultado>";
?>