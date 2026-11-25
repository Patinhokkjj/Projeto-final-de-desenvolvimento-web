<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $dados = json_decode(file_get_contents('php://input'), true);

  // confere o estoque (o servidor nunca confia só no JavaScript)
  foreach ($dados['itens'] as $i) {
    $p = $db->query("SELECT nome, estoque FROM produtos WHERE id = " . (int)$i['id'])->fetch_assoc();
    if ((int)$i['qtd'] < 1 || (int)$i['qtd'] > $p['estoque']) {
      http_response_code(400);
      echo json_encode(['erro' => 'Estoque insuficiente de ' . $p['nome'] . '. Disponível: ' . $p['estoque']]);
      exit;
    }
  }

  // soma o subtotal usando os preços do banco
  $subtotal = 0;
  foreach ($dados['itens'] as $i) {
    $p = $db->query("SELECT preco FROM produtos WHERE id = " . (int)$i['id'])->fetch_assoc();
    $subtotal += $p['preco'] * (int)$i['qtd'];
  }

  // frete: busca a UF no ViaCEP
  $cep = preg_replace('/\D/', '', $dados['cep']);
  $cidade = json_decode(file_get_contents("https://viacep.com.br/ws/$cep/json/"), true);
  $uf = $cidade['uf'] ?? '';
  $frete = ($uf == 'PA') ? 10 : 30;
  if ($subtotal >= 200) $frete = 0;

  $total = $subtotal + $frete;
  $cliente = (int)$dados['cliente_id'];
  $db->query("INSERT INTO compras (cliente_id, subtotal, frete, total) VALUES ($cliente, $subtotal, $frete, $total)");
  $compra = $db->insert_id;

  foreach ($dados['itens'] as $i) {
    $id = (int)$i['id']; $qtd = (int)$i['qtd'];
    $db->query("INSERT INTO itens_compra (compra_id, produto_id, quantidade, preco)
                SELECT $compra, id, $qtd, preco FROM produtos WHERE id = $id");
    $db->query("UPDATE produtos SET estoque = estoque - $qtd WHERE id = $id AND estoque >= $qtd");
  }
  echo json_encode(['ok' => true, 'compra' => $compra, 'frete' => $frete, 'total' => $total]);
  exit;
}

// GET: lista as compras
$r = $db->query("SELECT c.id, c.data, c.subtotal, c.frete, c.total, cl.nome
                 FROM compras c JOIN clientes cl ON cl.id = c.cliente_id ORDER BY c.id DESC");
echo json_encode($r->fetch_all(MYSQLI_ASSOC));
