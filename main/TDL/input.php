
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<?php
$dsn = "mysql:host=localhost;dbname=utspemwebmasbro";
$kunci = new PDO($dsn, "root", "");

$title = "Edit Mahasiswa";

$NIM = isset($_POST['NIM']) ? $_POST['NIM'] : '';

if ($NIM) {
    $sql = "SELECT * FROM mahasiswa WHERE NIM = ?";

    $stmt = $kunci->prepare($sql);
    $data = [$NIM];
    $stmt->execute($data);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    
    $row = [];
}
?>

<!doctype html>
<html>
    <head>
        <title><?=$title?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrapmin.css" rel="stylesheet" />
        <style>
        body
        {
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
        <a class="nav-link" href="input.php">Input Data</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid pt-3" style="width: 70%;">
<div class="row justify-content-center">
<div class="col-auto">

<!-- <div class="container-fluid pt-3" style="text-align: center; margin: 0 auto;">
        <h2>To Do List</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Create Task: </label>
            <input type="text" name="tugas" placeholder="Task title" required />
            <input type="date" name="tanggal" required />
            <textarea name="deskripsi" placeholder="Task description" required></textarea>
            <select name="priority">
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>
            <input type="submit" name="simpan" value="Add Task" />
        </form>
    </div> -->


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label class="form-label">Task Title</label><br>
            <input class="form-control" type="text" name="tugas" placeholder="Task title" required>    
        <label class="form-label">Tanggal</label><br>
            <input class="form-control" type="date" name="tanggal" required>
        <label class="form-label">Task Description</label><br>
            <input class="form-control" type="text" name="deskripsi" placeholder="Task Description" required>
        <label class="form-label">Task Priority</label><br>
            <select class="form-select" name="priority" aria-label="Default select example" required>
            <option selected>Open this select menu</option>
            <option value="1">High</option>
            <option value="2">Medium</option>
            <option value="3">Low</option>
        </select>
            <br>
        <input type="hidden" name="NIM" value="<?=$row['NIM'];?>">
        <input type="hidden" name="isEdit" value="1">
        <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto">Submit</button>
    </form>

