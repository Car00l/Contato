<?php

include('../../conexao/conn.php');

try{
    $sql = "UPDATE CONTATO SET NOME = ?, TELEFONE = ?, CELULAR = ?, EMAIL = ? WHERE ID = ?"; 

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_REQUEST['NOME'],
        $_REQUEST['TELEFONE'],
        $_REQUEST['CELULAR'],
        $_REQUEST['EMAIL'],
        $_REQUEST['ID'],
    ]);

    $dados = array(
        'type' => 'success',
        'mensagem' => 'Registro atualizado com sucesso!'
    );

}catch (PDOExeception $e){
    $dados = array(
        'type' => 'error',
        'mensagem' => 'Erro ao atualizar o registro:' .$e
    );
}

echo json_encode($dados);