<?php

// instancia com o banco de dados
include('../../conexao/conn.php');

try{
    // gerar a querie de insersao no banco de dados 
    $sql = "INSERT INTO CONTATO (NOME, TELEFONE, CELULAR, EMAIL) VALUES (?, ?, ?, ?)"; // colocar ? para deixar mais seguro
    // preparar a querie para gerar objetos de insersao no banco de dados

    $stmt = $pdo->prepare($sql); // atribuindo para ver se existe

    // se existir requerir os valores
    $stmt->execute([
        $_REQUEST['NOME'],
        $_REQUEST['TELEFONE'],
        $_REQUEST['CELULAR'],
        $_REQUEST['EMAIL']
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