<?php include_once('conexao.php'); ?>

<?php 
    function inserirNome($postNome){
        if(isset($postNome)){
            $sql = conexaoBD()->prepare("INSERT INTO cidadao VALUES (?, ?)");
            $sql->execute(array(uniqid('GE'), $postNome));
            echo 'Inserido com sucesso!';
        }
        print_r($sql);
        return $sql;
    }

?>