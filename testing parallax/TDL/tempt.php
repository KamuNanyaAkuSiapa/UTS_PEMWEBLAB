<?php
$dsn = "mysql:host=localhost;dbname=utspemwebmasbro";
$kunci = new PDO($dsn, "root", "");

$sql = "SELECT * FROM todolist";

$hasil = $kunci->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <title>To do list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
         body
        {
            background-image: url("../Profile/bg.webp");
            background-repeat: no-repeat;
            background-size: cover;
            backdrop-filter: blur(5px);      
        }        
         .table {
            background-color: white;
        } 
        .text-center {
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

    <div class="container-fluid pt-3" style="width: 90%;">
        <h3 class="text-center">To Do List</h3>
        <div class="row justify-content-center">
            <div class="col-auto">
                <table class="table table-striped">
                    <thead>
                        <tr class="table table-dark">
                            <th>Priority</th>
                            <th>Task Title</th>
                            <th>Date</th>
                            <th>Task Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $hasil->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['priority'] . "</td>";
                            echo "<td>" . $row['tugas'] . "</td>";
                            echo "<td>" . $row['tanggal'] . "</td>";
                            echo "<td>" . $row['deskripsi'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td class='text-center'>";
                            echo "<form action='testing_edit.php' method='post'>";
                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                            echo "<input type='hidden' name='isEdit' value='1'>";
                            echo "<button class='btn btn-dark' type='submit'>Edit</button>";
                            echo "</form>";
                            echo "<form action='process_delete.php' method='post'>";
                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                            echo "<input type='hidden' name='isDelete' value='1'>";
                            echo "<button class='btn btn-dark' type='submit' onclick='return confirm(\"Hapus data. Apa anda yakin?\")'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
