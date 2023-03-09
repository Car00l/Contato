<?php

include('../../conexao/conn.php');

$sql = "SELECT * FROM CONTATO";

$resultado = $pdo->query($sql);

if($resultado){
    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
        $dados[] = array_map(null, $row);
    }
}

echo json_encode($resultado);

?>