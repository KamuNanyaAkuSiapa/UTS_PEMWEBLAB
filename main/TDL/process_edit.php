<?php

    $dsn = "mysql:host=localhost;dbname=utspemwebmasbro";
    $kunci = new PDO($dsn, "root", "");
    $id = $_POST['id'];
    $tugas = $_POST['tugas'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];
    $priority = $_POST['priority'];

    $sql = "UPDATE todolist SET tugas = ?, tanggal = ?, deskripsi = ?, priority = ?
            WHERE id = ?";

    $stmt = $kunci->prepare($sql);
    $data = [$tugas, $tanggal, $deskripsi, $priority, $id];
    $stmt->execute($data);

    header('Location: tempt.php');

?>
