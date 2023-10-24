
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<?php
$dsn = "mysql:host=localhost;dbname=utspemwebmasbro";
$kunci = new PDO($dsn, "root", "");

$title = "Login";

session_start(); // Mulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'])) {
        $_SESSION['username'] = $_POST['username']; // Simpan username ke dalam sesi
    }
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
            background-image: url("../Profile/livebg.webp");
            background-repeat: no-repeat;
            background-size: cover;
            align-items: center; 
            justify-content: center;
            display: flex;
            backdrop-filter: blur(5px);
            color: white; 
                 
        } 
        /* CSS untuk form login */
        .login-form {
            margin-bottom: 20px; /* Menambahkan margin antara form login dan subscribe */
        }

        .login-form input {
            display: block;
            margin-bottom: 10px; /* Menambahkan margin antara input */
        }

        /* CSS untuk form subscribe */
        .subscribe {
            position: relative;
            height: 240px;
            width: 300px;
            padding: 20px;
            background-color: #FFF;
            border-radius: 4px;
            color: #333;
            box-shadow: 0px 0px 60px 5px rgba(0, 0, 0, 0.4);
        }

        .subscribe:after {
            position: absolute;
            content: "";
            right: -10px;
            bottom: 18px;
            width: 0;
            height: 0;
            border-left: 0px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #1a044e;
        }

        .subscribe p {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            font-family: 'Franklin Gothic Heavy';
            letter-spacing: 4px;
            line-height: 28px;
        }

        .subscribe input {
            border: none;
            border-bottom: 1px solid #d4d4d4;
            padding: 10px;
            width: 100%;
            background: transparent;
            transition: all .25s ease;
            margin-bottom: 10px; /* Menambahkan margin antara input */
        }

        .subscribe input:focus {
            outline: none;
            border-bottom: 1px solid #0d095e;
            font-family: 'Franklin Gothic Heavy';
        }

        .subscribe .submit-btn {
            position: absolute;
            border-radius: 30px;
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            background-color: #0f0092;
            color: #FFF;
            padding: 12px 25px;
            display: inline-block;
            font-size: 12px;
            font-weight: bold;
            font-family: 'Franklin Gothic Heavy';
            letter-spacing: 5px;
            right: -10px;
            bottom: -20px;
            cursor: pointer;
            transition: all .25s ease;
            box-shadow: -5px 6px 20px 0px rgba(26, 26, 26, 0.4);
        }

        .subscribe .submit-btn:hover {
            background-color: #07013d;
            box-shadow: -5px 6px 20px 0px rgba(88, 88, 88, 0.569);
        }    
    </style>   
    </head>
<body>

<div class="container-fluid pt-3" style="width: 70%;">
<div class="row justify-content-center">
<div class="col-auto">

    <div class="subscribe">
        <p>LOGIN</p>
        <form action="login_process.php" method="post">
        <input placeholder="username" class="subscribe-input" name="username" type="text">
        <br>
        <input placeholder="password" class="subscribe-input" name="password" type="password">
        <br>
        <div id="emailHelp" class="form-text">Don't have an account? <a href="register.php">Register.</a></div>
        <div id="emailHelp" class="form-text">Forgot Password? <a href="LupaPassword.php">Reset Password</a></div>
        <br>
        <button class="submit-btn">SUBMIT</button>
    </div>
