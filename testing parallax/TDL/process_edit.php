<?php
$dsn = "mysql:host=localhost;dbname=utspemwebmasbro";
$kunci = new PDO($dsn, "root", "");

    global $dsn;
    global $kunci;

    try {
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
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

if (!empty($_POST['isAdd'])){
    addData();
} elseif (!empty($_POST['isEdit'])){
    editData();
} elseif (!empty($_POST['isDelete'])){
    deleteData();
}
?>
