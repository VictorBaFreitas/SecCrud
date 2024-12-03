<?php
include 'db.php';

$stmt = $conn->prepare("SELECT * FROM produtos");
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Lista de Produtos</h1>
    <a href="create.php" class="btn btn-primary mb-3">Adicionar Produto</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço de Custo</th>
                <th>Preço de Venda</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($produto['id']); ?></td>
                    <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                    <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                    <td><?php echo htmlspecialchars($produto['preco_custo']); ?></td>
                    <td><?php echo htmlspecialchars($produto['preco_venda']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $produto['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este produto?');">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>