<?php
try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=crud_php", "knuckles", "mydba");
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>