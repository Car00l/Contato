<?php

include('../../conexao/conn.php');

try{
    $sql = "UPDATE PRODUTO SET NOME_PRODUTO = ?, MARCA_PRODUTO = ?, FABRICANTE_PRODUTO = ?, VALOR_COMPRA_PRODUTO = ?, VALOR_VENDA_PRODUTO = ?, ESTOQUE_PRODUTO = ? WHERE ID_PRODUTO = ?"; 

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_REQUEST['NOME_PRODUTO'],
        $_REQUEST['MARCA_PRODUTO'],
        $_REQUEST['FABRICANTE_PRODUTO'],
        $_REQUEST['VALOR_COMPRA_PRODUTO'],
        $_REQUEST['VALOR_VENDA_PRODUTO'],
        $_REQUEST['ESTOQUE_PRODUTO'],
        $_REQUEST['ID_PRODUTO'],
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