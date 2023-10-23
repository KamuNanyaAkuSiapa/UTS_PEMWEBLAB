<?php

$dsn = "mysql:host=localhost;dbname=utspemwebmasbro";
$kunci = new PDO($dsn, "root", "");

$id = $_GET['id'];

$sql = "UPDATE todolist SET status = 'In Progress' WHERE id = ?";

$hasil = $kunci->prepare($sql);

$hasil->execute([$id]);

header("Location: tempt.php");



