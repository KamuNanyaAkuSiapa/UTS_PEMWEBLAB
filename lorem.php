
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<?php
$dsn = "mysql:host=localhost;dbname=pemweb07";
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
            background-image: url("Profile/bg3.webp");
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
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Login</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid pt-3" style="width: 70%;">
<div class="row justify-content-center">
<div class="col-auto">
<?php
if (!empty($_POST)){
    echo '<h4 class="text-center">Edit Data Mahasiswa</h4>';
?> 
<?php
} else {
    echo '<h4 class="text-center">Login </h4>';
?> 
    <form action="login_process.php" method="post">
     <form action="proses.php" method="post" enctype="multipart/form-data">
        <label class="form-label">Username</label><br>
            <input class="form-control" type="text" name="username" min="0" maxlength="11" required>    
        <label class="form-label">Password</label><br>
            <input class="form-control" type="password" name="password" min="0" maxlength="50" required>
            <div id="emailHelp" class="form-text">Don't have an account? <a href="register.php">Register.</a>
</div>

            <br>
        <input type="hidden" name="isAdd" value="1">
        <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto">Submit</button>
    </form>
<?php
}
?>