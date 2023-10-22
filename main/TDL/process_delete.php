<?php
$dsn = "mysql:host=localhost;dbname=utspemwebmasbro";
$kunci = new PDO($dsn, "root", "");


    global $dsn;
    global $kunci;

    try {
        $id = $_POST['id'];

        $sql = "DELETE FROM todolist WHERE id = ?";  

        $stmt = $kunci->prepare($sql);
        $data = [$id];
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
