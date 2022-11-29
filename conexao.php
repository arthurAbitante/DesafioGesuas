<?php 

function conexaoBD(){
    $pdo = new PDO('mysql:host=localhost;dbname=gesuas', 'root', '123456');
    return $pdo;
}


?>