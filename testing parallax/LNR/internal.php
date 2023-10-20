<?php
session_start();
//require_once('db.php');

if(!isset($_SESSION['username']) &&
    !isset($_SESSION['user_id']) &&
    !isset($_SESSION['user_role'])){
    echo "You don't have access to this page";
}else{
        if($_SESSION['user_role'] == "lecturer"){
            echo "THIS IS A LECTURER AREA<br />";
            echo "WELCOME " . $_SESSION['username'];
        }
        elseif($_SESSION['user_role'] == "Xstudent"){
            echo "THIS IS A STUDENT AREA<br />";
            echo "WELCOME " . $_SESSION['username'];
        }
    }
?>

<?php
if(!isset($_SESSION['user_id'])){
?>
<a href="login.php">Login</a>
<?php
}else{
?>
<a href="logout.php">Logout</a>
<?php
}
?>