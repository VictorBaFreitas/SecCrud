<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
?>