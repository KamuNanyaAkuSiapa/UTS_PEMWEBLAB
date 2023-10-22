<?php
$dsn = "mysql:host=localhost;dbname=utspemwebmasbro";
$username = "root";
$password = "";

try {
    $kunci = new PDO($dsn, $username, $password);
    $kunci->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Perform the SQL query to fetch the task list
    $sql = "SELECT * FROM todolist";
    $hasil = $kunci->query($sql);

    // Handle task addition
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["simpan"])) {
        $tugas = $_POST["tugas"];
        $tanggal = $_POST["tanggal"];
        $deskripsi = $_POST["deskripsi"];
        $priority = $_POST["priority"];

        $sqlInsert = "INSERT INTO todolist (tugas, tanggal, deskripsi, priority, status) 
                      VALUES (:tugas, :tanggal, :deskripsi, :priority, 'not_started')";
        $stmt = $kunci->prepare($sqlInsert);
        $stmt->bindParam(':tugas', $tugas);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':priority', $priority);
        $stmt->execute();

        // Redirect to avoid form resubmission on refresh
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
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
            background-image: url("../Profile/bg1.webp");
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
                <a class="nav-link active fw-bold" disabled>Data Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="home.php">Daftar Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">To Do List</a>
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
                    <input class="form-control" type="text" name="tugas" placeholder="Task title" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input class="form-control" type="date" name="tanggal" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Task Description</label>
                    <textarea class="form-control" name="deskripsi" placeholder="Task Description" required></textarea>
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
            </form>
        </div>
    </div>
</div>
</body>
</html>
