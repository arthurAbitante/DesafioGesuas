<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php include_once('cadastrar.php') ?>
<?php include_once('filtrar.php') ?>

<form name="search_form" method="post">
    <input type="text" name="search_box" id="search_box" value="">
    <input type="submit"name="search" value="Encontrar por NIS">
</form>

<hr>

<form method="post">
    <div class="form-group">
        <label for="inputNome">Nome</label>
        <input type="text" class="form-control" id="inputNome" placeholder="Digite o nome do cidadão" name="nome">
        <input class="btn btn-secondary" type="submit" value="Cadastrar">
    </div>
</form>

<?php
    inserirNome($_POST['nome']);
    var_dump(inserirNome($_POST['nome']));
?>

<?php 

if(isset($_POST['search'])){
    $sql = filtrarPorNis($_POST['search_box']);
    //var_dump($sql);

}else{
    $sql = conexaoBD()->prepare("SELECT * FROM cidadao");
}
var_dump($sql);

$sql->execute();

$fetchCidadaos = $sql->fetchAll();

echo '<table class="table"><thead><tr><th scope="col">NIS</th><th scope="col">NOME</th></tr></thead>';

echo '<tbody>';
foreach($fetchCidadaos as $key => $value){
    echo '<tr><td>'.$value['nis'].' </td><td>'.$value['nome'].' </td></tr>';
}
echo '</tbody>';
echo '</table>';
?>

</body>

</html>