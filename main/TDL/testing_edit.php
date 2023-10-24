<?php

$dsn = "mysql:host=localhost;dbname=utspemwebmasbro";
$kunci = new PDO($dsn, "root", "");
$id = $_GET['id'];
$sql = "SELECT * from todolist WHERE id = $id";
$hasil = $kunci->query($sql);
$row = $hasil->fetch(PDO::FETCH_ASSOC);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Input Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-image: url("../Profile/livebg1.webp");
            background-repeat: no-repeat;
            background-size: cover;
            backdrop-filter: blur(5px);
            color: white; 
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid justify-content-center">
    <ul class="navbar-nav navbar-center">
        <li class="nav-item">
            <a class="nav-link active fw-bold" disabled>To Do List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="testing.php">Input Data</a>
        </li>
        </ul>
    </div>
</nav>

<div class="container-fluid pt-3" style="width: 70%;">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h2>To Do List</h2>
            <form action="process_edit.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Task Title</label>
                    <input class="form-control" type="text" name="tugas" placeholder="Task title" value="<?= $row['tugas']?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input class="form-control" type="date" name="tanggal" value="<?= $row['tanggal']?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Task Description</label>
                    <textarea class="form-control" name="deskripsi" placeholder="Task Description" required><?= $row['deskripsi']?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Task Priority</label>
                    <select class="form-select" name="priority" required>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Task</button>
                <div class="mb-3 invisible">
                    <label class="form-label">Task Title</label>
                    <input class="form-control" type="text" name="id" placeholder="Task title" value="">
                </div>
                <div class="mb-3 invisible">
                    <label class="form-label">Task Title</label>
                    <input class="form-control" type="text" name="id" placeholder="Task title" value="<?= $row['id'] ?>" required>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
