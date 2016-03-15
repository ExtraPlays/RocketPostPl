<?php
$nome = $_GET['nome'];
$autor = $_GET['autor'];
$versao = $_GET['versao'];
$versaosv = $_GET['versaosv'];
$info = $_GET['info'];

require_once 'sql.php';
$plugins = new MyMysqli("localhost", "user", "pass", "db");
$id = $plugins->getPL();
$plugins->postPlugin($nome, $versao, $versaosv, $autor, $info, $id + 1);
header("Location: https://rocketbr.com/pp/index");
?>