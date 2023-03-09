<?php

include('../../conexao/conn.php');

try{
    $sql = "DELETE FROM CONTATO WHERE ID = ?"; 

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_REQUEST['ID'],
    ]);

    $dados = array(
        'type' => 'success',
        'mensagem' => 'Registro deletado com sucesso!'
    );

}catch (PDOExeception $e){
    $dados = array(
        'type' => 'error',
        'mensagem' => 'Erro ao deletar o registro:' .$e
    );
}

echo json_encode($dados);