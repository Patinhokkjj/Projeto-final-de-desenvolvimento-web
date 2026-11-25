<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $st = $db->prepare("INSERT INTO produtos (nome, preco, estoque) VALUES (?, ?, ?)");
  $estoque = max(0, (int)$_POST['estoque']);   // nunca negativo
  $st->bind_param('sdi', $_POST['nome'], $_POST['preco'], $estoque);
  $st->execute();
}

$r = $db->query("SELECT * FROM produtos ORDER BY nome");
echo json_encode($r->fetch_all(MYSQLI_ASSOC));
