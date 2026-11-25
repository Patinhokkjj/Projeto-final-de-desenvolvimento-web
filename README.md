# Projeto-final-de-desenvolvimento-web
# 🛒 Nome da Loja - Projeto Final

Aplicação web de loja virtual desenvolvida como Projeto Final da disciplina **[nome da disciplina]**, com cadastro de clientes e produtos, carrinho de compras e cálculo de frete por CEP.

> **Aluno(a):** [Seu Nome]
> **Curso/Turma:** [Curso / Turma]
> **Professor(a):** [Nome do Professor]
> **Data de entrega:** 30/11/2026

---

## 📋 Sobre o projeto

O sistema simula um site de compras de **[roupas / eletrônicos / mercado - escolha o seu]**. O cliente pode se cadastrar, navegar pelos produtos, montar um carrinho, calcular o frete informando o CEP e finalizar a compra. Os dados ficam armazenados em um banco de dados MySQL.

## ✅ Requisitos atendidos

| Requisito da atividade | Situação |
|---|---|
| HTML5, CSS3, JavaScript e PHP | ✅ |
| Banco de dados MySQL | ✅ |
| Tela de cadastro de clientes | ✅ |
| Tela de cadastro de produtos | ✅ |
| Site de compras com carrinho | ✅ |
| Busca de CEP para cálculo de frete (ViaCEP) | ✅ |
| Tabelas CLIENTES, PRODUTOS e COMPRAS | ✅ |

## 🚀 Funcionalidades

- **Cadastro de clientes:** nome, e-mail, senha, telefone e endereço (preenchido automaticamente pelo CEP).
- **Cadastro de produtos:** nome, descrição, preço, estoque e imagem.
- **Listagem de produtos** com botão "Adicionar ao carrinho".
- **Carrinho de compras:** adicionar, remover e alterar a quantidade dos itens, com total atualizado.
- **Cálculo de frete:** consulta o CEP na API ViaCEP e calcula o valor conforme a região.
- **Finalização da compra:** registra o pedido no banco de dados.

## 🛠️ Tecnologias utilizadas

- **HTML5** - estrutura das páginas
- **CSS3** - estilização e layout responsivo
- **JavaScript** - carrinho, validações e consumo da API ViaCEP
- **PHP** - regras de negócio e comunicação com o banco
- **MySQL** - armazenamento dos dados
- **ViaCEP** - consulta de endereço por CEP ([viacep.com.br](https://viacep.com.br))
- **XAMPP** (Apache + MySQL) - ambiente de desenvolvimento local
- **Git e GitHub** - controle de versão

## 🗂️ Estrutura de pastas

```
projeto-final/
├── index.php                 # Página inicial / lista de produtos
├── cadastro_cliente.php      # Tela de cadastro de clientes
├── cadastro_produto.php      # Tela de cadastro de produtos
├── carrinho.php              # Carrinho de compras e frete
├── finalizar_compra.php      # Registro da compra
├── css/
│   └── style.css
├── js/
│   ├── carrinho.js
│   └── cep.js                # Integração com ViaCEP
├── includes/
│   └── conexao.php           # Conexão com o MySQL
├── img/                      # Imagens dos produtos
├── banco/
│   └── script.sql            # Script de criação do banco
└── README.md
```

> Ajuste a estrutura acima para refletir exatamente os arquivos do seu projeto.

## 🗄️ Banco de dados

Nome do banco: `loja`

### Tabelas

**CLIENTES**

| Campo | Tipo | Observação |
|---|---|---|
| id | INT | Chave primária, auto incremento |
| nome | VARCHAR(100) | |
| email | VARCHAR(100) | Único |
| senha | VARCHAR(255) | Armazenada com hash |
| telefone | VARCHAR(20) | |
| cep | VARCHAR(9) | |
| endereco | VARCHAR(150) | |
| numero | VARCHAR(10) | |
| bairro | VARCHAR(80) | |
| cidade | VARCHAR(80) | |
| uf | CHAR(2) | |

**PRODUTOS**

| Campo | Tipo | Observação |
|---|---|---|
| id | INT | Chave primária, auto incremento |
| nome | VARCHAR(100) | |
| descricao | TEXT | |
| preco | DECIMAL(10,2) | |
| estoque | INT | |
| imagem | VARCHAR(255) | Caminho da imagem |

**COMPRAS**

| Campo | Tipo | Observação |
|---|---|---|
| id | INT | Chave primária, auto incremento |
| id_cliente | INT | Chave estrangeira → CLIENTES |
| data_compra | DATETIME | |
| frete | DECIMAL(10,2) | |
| total | DECIMAL(10,2) | |

**ITENS_COMPRA** *(tabela adicional)*

| Campo | Tipo | Observação |
|---|---|---|
| id | INT | Chave primária, auto incremento |
| id_compra | INT | Chave estrangeira → COMPRAS |
| id_produto | INT | Chave estrangeira → PRODUTOS |
| quantidade | INT | |
| preco_unitario | DECIMAL(10,2) | |

### Script SQL

```sql
CREATE DATABASE IF NOT EXISTS loja CHARACTER SET utf8mb4;
USE loja;

CREATE TABLE clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  telefone VARCHAR(20),
  cep VARCHAR(9),
  endereco VARCHAR(150),
  numero VARCHAR(10),
  bairro VARCHAR(80),
  cidade VARCHAR(80),
  uf CHAR(2)
);

CREATE TABLE produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT,
  preco DECIMAL(10,2) NOT NULL,
  estoque INT NOT NULL DEFAULT 0,
  imagem VARCHAR(255)
);

CREATE TABLE compras (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_cliente INT NOT NULL,
  data_compra DATETIME DEFAULT CURRENT_TIMESTAMP,
  frete DECIMAL(10,2) NOT NULL DEFAULT 0,
  total DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);

CREATE TABLE itens_compra (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_compra INT NOT NULL,
  id_produto INT NOT NULL,
  quantidade INT NOT NULL,
  preco_unitario DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (id_compra) REFERENCES compras(id),
  FOREIGN KEY (id_produto) REFERENCES produtos(id)
);
```

## ⚙️ Como executar o projeto

### Pré-requisitos

- [XAMPP](https://www.apachefriends.org/) (ou WAMP/Laragon) com Apache, PHP e MySQL
- Navegador atualizado
- Conexão com a internet (para a API ViaCEP)

### Passo a passo

1. **Clone o repositório** dentro da pasta `htdocs` do XAMPP:
   ```bash
   cd C:/xampp/htdocs
   git clone https://github.com/seu-usuario/seu-repositorio.git projeto-final
   ```
2. **Inicie o Apache e o MySQL** pelo painel do XAMPP.
3. **Crie o banco de dados:**
   - Acesse `http://localhost/phpmyadmin`
   - Importe o arquivo `banco/script.sql` (aba *Importar*).
4. **Configure a conexão** em `includes/conexao.php`:
   ```php
   $host = "localhost";
   $usuario = "root";
   $senha = "";
   $banco = "loja";
   ```
5. **Acesse o site** no navegador:
   ```
   http://localhost/projeto-final/
   ```

## 🚚 Cálculo de frete

O CEP informado é consultado na API ViaCEP:

```
https://viacep.com.br/ws/{CEP}/json/
```

A resposta traz o endereço e a UF, e o valor do frete é definido conforme a regra abaixo *(ajuste para a regra que você implementou)*:

| Região | Frete |
|---|---|
| Mesmo estado | R$ 15,00 |
| Demais estados | R$ 30,00 |

## 📸 Capturas de tela

> Adicione aqui prints das telas do sistema (salve em uma pasta `prints/`).

- Página inicial
- Cadastro de clientes
- Cadastro de produtos
- Carrinho com cálculo de frete

## 🔒 Boas práticas aplicadas

- Senhas armazenadas com `password_hash()`
- Consultas ao banco com *prepared statements* (PDO/MySQLi) para evitar SQL Injection
- Validação de dados no front-end (JavaScript) e no back-end (PHP)

## 👤 Autor

**[Seu Nome]**
GitHub: [@seu-usuario](https://github.com/seu-usuario)
E-mail: seu@email.com

---

📚 Projeto desenvolvido para fins acadêmicos.
