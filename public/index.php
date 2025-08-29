<?php
use core\classes\Database;
use core\classes\Functions;

// Abrir a sessão
session_start();

// carregar config
require_once "../config.php";

// carregar classes
require_once "../vendor/autoload.php";


$pdo = new Database();

$pdo->insert("INSERT INTO clientes(nome)VALUES('pedro')");

$clientes = $pdo->select("SELECT * FROM clientes");
echo "<pre>";
print_r($clientes);
