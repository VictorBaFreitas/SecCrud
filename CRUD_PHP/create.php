<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco_custo = str_replace(',', '.', $_POST['preco_custo']);
    $preco_venda = str_replace(',', '.', $_POST['preco_venda']);

    $stmt = $conn->prepare("INSERT INTO produtos (descricao, quantidade, preco_custo, preco_venda) VALUES (?, ?, ?, ?)");
    $stmt->execute([$descricao, $quantidade, $preco_custo, $preco_venda]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Adicionar Produto</h1>
    <form method="post">
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" required>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" required>
        </div>
        <div class="mb-3">
            <label for="preco_custo" class="form-label">Preço de Custo</label>
            <input type="text" class="form-control" id="preco_custo" name="preco_custo" required>
        </div>
        <div class="mb-3">
            <label for="preco_venda" class="form-label">Preço de Venda</label>
            <input type="text" class="form-control" id="preco_venda" name="preco_venda" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>