<?php include_once('conexao.php'); ?>

<?php 
function filtrarPorNis($nis){
    $sql_filters = "SELECT * FROM cidadao WHERE nis LIKE '%{$nis}'";
    $sql = conexaoBD()->prepare($sql_filters);
    
    return $sql;
}

?>