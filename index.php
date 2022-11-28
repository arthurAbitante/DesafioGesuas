<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php
    $pdo = new PDO('mysql:host=localhost;dbname=gesuas', 'root', '123456');

    if(isset($_POST['nome'])){
        $sql = $pdo->prepare("INSERT INTO cidadao VALUES (?, ?)");
        $sql->execute(array(uniqid('GE'), $_POST['nome']));
        echo 'Inserido com sucesso!';
    }
?>

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

if(isset($_POST['search'])){
    $search_term = $_POST['search_box'];
    $sql_filters = "SELECT * FROM cidadao WHERE nis LIKE '%{$search_term}'";
    $sql = $pdo->prepare($sql_filters);
}else{
    $sql = $pdo->prepare("SELECT * FROM cidadao");
}
var_dump(isset($_POST['search']));

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