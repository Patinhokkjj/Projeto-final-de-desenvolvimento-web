CREATE DATABASE IF NOT EXISTS mercado CHARACTER SET utf8mb4;
USE mercado;

CREATE TABLE clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  cpf VARCHAR(14) NOT NULL,
  cep VARCHAR(9) NOT NULL,
  endereco VARCHAR(200)
);

CREATE TABLE produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  estoque INT NOT NULL
);

CREATE TABLE compras (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cliente_id INT NOT NULL,
  subtotal DECIMAL(10,2),
  frete DECIMAL(10,2),
  total DECIMAL(10,2),
  data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE itens_compra (
  id INT AUTO_INCREMENT PRIMARY KEY,
  compra_id INT NOT NULL,
  produto_id INT NOT NULL,
  quantidade INT NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (compra_id) REFERENCES compras(id),
  FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

INSERT INTO produtos (nome, preco, estoque) VALUES
('Arroz 5kg', 29.90, 50), ('Feijão 1kg', 8.90, 70), ('Leite 1L', 5.20, 120),
('Café 500g', 18.90, 55), ('Banana (kg)', 6.50, 80), ('Açaí 1kg', 24.90, 40);
