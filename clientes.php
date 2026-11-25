<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $st = $db->prepare("INSERT INTO clientes (nome, email, cpf, cep, endereco) VALUES (?, ?, ?, ?, ?)");
  $st->bind_param('sssss', $_POST['nome'], $_POST['email'], $_POST['cpf'], $_POST['cep'], $_POST['endereco']);
  $st->execute();
}

$r = $db->query("SELECT * FROM clientes ORDER BY nome");
echo json_encode($r->fetch_all(MYSQLI_ASSOC));
