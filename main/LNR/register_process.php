<?php
require_once('db.php');
// Data from Form
$username = $_POST['username'];
$password = $_POST['password'];
// Encrypt the Password
$en_pass = password_hash($password, PASSWORD_BCRYPT);
// 2. SQL Query
$sql = "INSERT INTO user (username, password)
        VALUES(?, ?)";
// 3 Execute Query
$result = $db->prepare($sql);
$result->execute([$username, $en_pass]);
header ('location: login.php');