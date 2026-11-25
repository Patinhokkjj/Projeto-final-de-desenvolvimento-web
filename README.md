# 🛒 Mercado de Hylian

Projeto Final desenvolvido por **mim**, aluno(a) do curso de **ADS**, na disciplina **DESENVOLVIMENTO DE APLICAÇÕES PARA INTERNET**.

---

## 📖 Sobre o projeto

Este projeto é uma **loja virtual** de **mercado**, criada para praticar o desenvolvimento web completo, do visual do site até o armazenamento dos dados em um banco de dados.

A ideia é que o cliente possa se cadastrar, escolher produtos, colocá-los no carrinho, calcular o frete pelo CEP e finalizar a compra. Também haverá uma área para cadastrar os produtos que ficam à venda.

## 🎯 Objetivo

Aplicar na prática o que foi aprendido durante a disciplina, construindo uma aplicação web que une **front-end**, **back-end** e **banco de dados**, simulando o funcionamento de um site de compras real.

## 🚀 Funcionalidades

- **Cadastro de clientes:** o cliente informa seus dados pessoais e endereço, que são salvos no banco de dados.
- **Cadastro de produtos:** cadastro de nome, descrição, preço, estoque e imagem dos produtos.
- **Vitrine de produtos:** página com todos os produtos disponíveis para compra.
- **Carrinho de compras:** adicionar e remover produtos, alterar quantidades e ver o total da compra.
- **Cálculo de frete por CEP:** o CEP é consultado na API do ViaCEP, que devolve o endereço e permite calcular o valor do frete.
- **Finalização da compra:** a compra é registrada no banco de dados, vinculada ao cliente.

## 🛠️ Tecnologias

| Tecnologia | Uso no projeto |
|---|---|
| **HTML5** | Estrutura das páginas |
| **CSS3** | Visual e layout do site |
| **JavaScript** | Interações, carrinho e consulta do CEP |
| **PHP** | Lógica do sistema e comunicação com o banco |
| **MySQL** | Armazenamento dos dados |
| **ViaCEP** | Busca de endereço e cálculo de frete |
| **Git e GitHub** | Controle de versão do código |

## 🗄️ Banco de dados

O banco de dados terá, no mínimo, as três tabelas exigidas pela atividade, além de uma tabela extra para guardar os itens de cada compra:

- **CLIENTES:** dados pessoais e endereço de quem compra.
- **PRODUTOS:** informações dos produtos à venda (nome, preço, estoque, imagem).
- **COMPRAS:** registro de cada compra feita, com cliente, data, frete e valor total.
- **ITENS_COMPRA:** produtos e quantidades de cada compra (tabela adicional).

## ✅ Requisitos da atividade

- [x] Aplicação web com HTML5, CSS3, JavaScript e PHP
- [x] Banco de dados MySQL
- [x] Tela de cadastro de clientes
- [x] Tela de cadastro de produtos
- [x] Site de compras com carrinho
- [x] Busca de CEP para cálculo do frete (ViaCEP)
- [x] Tabelas CLIENTES, PRODUTOS e COMPRAS

## 👤 Autor

**Iarlley**
GitHub: @Patinhokkjj(https://github.com/Patinhokkjj)

---

📚 Projeto desenvolvido para fins acadêmicos.
