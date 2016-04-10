<?php


include_once './auxiliares/db.php';

if (isset($_POST['idMovie'],$_POST['idList'])  ) {
    $idMovie = $_POST['idMovie'];
    $idList=$_POST['idList'];
    $seen = $_POST['seen'];
    $db = new DB();
    $db->setVisto($idMovie, $idList, $seen);
    
}else {
    echo "Must send idMovie, idList and seen";
}

?> 
