<?php

$dsn = "mysql:host=localhost;dbname=utspemwebmasbro";
$kunci = new PDO($dsn, "root", "");

$username = $_POST['username'];
$password = $_POST['password'];

$en_pass = password_hash($password, PASSWORD_BCRYPT);

$sql = "UPDATE user SET password = ? where username = ?";

$hasil = $kunci->prepare($sql);

$hasil->execute([$en_pass, $username]);

echo '<script>
    alert("Password Sudah Direset");
    window.location.href="login.php";
    </script>';


