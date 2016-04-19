<?php


$id_list =$_POST['idList'];

if ($_FILES["file"]["type"] == ""){
    header("Location: ./index.php?list=$id_list");
     die();
}     
$error = null;

// Controlar si son los tipos de archivo autorizados
if (($_FILES["file"]["type"] == "image/jpeg") && ($_FILES["file"]["size"] < 200000)) { // menor a 20k
    if ($_FILES["file"]["error"] > 0) {
        $error = "Error: " . $_FILES["file"]["error"];
    } else {
        $carpeta_archivos = "avatar/";
        $file = $_POST['idMovie'] . ".jpg";
        move_uploaded_file($_FILES["file"]["tmp_name"], $carpeta_archivos . $file);
        header("Location: ./index.php?list=$id_list");
         die();
    }
}
else
    if ($_FILES["file"]["type"] == "image/jpeg") 
        $error = "Error: Supera el tamaño máximo de 20k.";
    else 
        $error = "Error: Formato no soportado: " . $_FILES["file"]["type"];


include './vistas/subirArchivo.phtml';

?> 
