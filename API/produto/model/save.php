<?php
include('../../conexao/conn.php');

$NOME_PRODUTO = $_POST['NOME_PRODUTO']; //nome do produto vindo de um formulário, por exemplo
$sql = "SELECT NOME_PRODUTO FROM PRODUTO WHERE NOME_PRODUTO = $NOME_PRODUTO";
$stmt->bindParam(':NOME_PRODUTO', $NOME_PRODUTO, PDO::PARAM_STR);

if ($stmt->execute()){
//verifica se o produto já existe
if ($stmt->rowCount() < 0) {
    echo "O produto já existe.";
} else {
    try{
    // gerar a query de inserção no banco de dados 
    $sql = "INSERT INTO PRODUTO (NOME_PRODUTO, MARCA_PRODUTO, FABRICANTE_PRODUTO, VALOR_COMPRA_PRODUTO, VALOR_VENDA_PRODUTO, ESTOQUE_PRODUTO) VALUES (?, ?, ?, ?, ?, ?)"; // colocar ? para deixar mais seguro
    // preparar a query para gerar objetos de inserção no banco de dados

    $stmt = $pdo->prepare($sql); // corrigir a referência à conexão com o banco de dados

    // se existir requerir os valores
    $stmt->execute([
        $_REQUEST['NOME_PRODUTO'], 
        $_REQUEST['MARCA_PRODUTO'], 
        $_REQUEST['FABRICANTE_PRODUTO'], 
        $_REQUEST['VALOR_COMPRA_PRODUTO'], 
        $_REQUEST['VALOR_VENDA_PRODUTO'], 
        $_REQUEST['ESTOQUE_PRODUTO'] 
    ]);

    // transforma os dados em um array
    $dados = array(
        'type' => 'success',
        'mensagem' => 'Registro salvo com sucesso!'
    );
    // se nao existir mostrar erro
}catch (PDOException $e){ // corrigir a grafia de PDOException
    $dados = array(
        'type' => 'error',
        'mensagem' => 'Erro ao salvar o registro:' .$e->getMessage() // adicionar o método getMessage() para exibir a mensagem de erro
    );
}
}
}

echo json_encode($dados);