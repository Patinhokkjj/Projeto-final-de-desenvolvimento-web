<?php
// Altere usuário e senha do seu MySQL
$db = new mysqli('localhost', 'root', '', 'mercado');
$db->set_charset('utf8mb4');
header('Content-Type: application/json; charset=utf-8');
