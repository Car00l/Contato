<?php

// instancia com o banco de dados
include('../../conexao/conn.php');



try{
    // gerar a querie de insersao no banco de dados 
    $sql = "INSERT INTO PRODUTO (NOME_PRODUTO, MARCA_PRODUTO, FABRICANTE_PRODUTO, VALOR_COMPRA_PRODUTO, VALOR_VENDA_PRODUTO, ESTOQUE_PRODUTO) VALUES (?, ?, ?, ?, ?, ?)"; // colocar ? para deixar mais seguro
    // preparar a querie para gerar objetos de insersao no banco de dados

    $stmt = $pdo->prepare($sql); // atribuindo para ver se existe

    // se existir requerir os valores
    $stmt->execute([
        $_REQUEST['NOME_PRODUTO'],
        $_REQUEST['MARCA_PRODUTO'],
        $_REQUEST['FABRICANTE_PRODUTO'],
        $_REQUEST['VALOR_COMPRA_PRODUTO'],
        $_REQUEST['VALOR_VENDA_PRODUTO'],
        $_REQUEST['ESTOQUE_PRODUTO']
    ]);

    // tranforma os dados em um array
    $dados = array(
        'type' => 'success',
        'mensagem' => 'Registro salvo com sucesso!'
    );
    // se nao existir mostrar erro
}catch (PDOExeception $e){
    $dados = array(
        'type' => 'error',
        'mensagem' => 'Erro ao salvar o registro:' .$e
    );
}

echo json_encode($dados);