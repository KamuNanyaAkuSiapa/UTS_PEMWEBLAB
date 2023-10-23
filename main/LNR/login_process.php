<?php
require_once('db.php');

// Data from Form
$username = $_POST['username'];
$password = $_POST['password'];

// Check if user exists
$sql = "SELECT * FROM user
        WHERE username = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$username]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    echo '<div class="tenor-gif-embed" data-postid="15441539" data-share-method="host" data-aspect-ratio="1.78771" data-width="100%"><a href="https://tenor.com/view/aku-siapa-kamu-siapa-aku-siapa-nari-who-are-you-gif-15441539">Aku Siapa Kamu Siapa GIF</a>from <a href="https://tenor.com/search/aku+siapa-gifs">Aku Siapa GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>';

    echo '<script>
        function playSound(audioName){
          let audio = new Audio(audioName);
          audio.loop = true; 
          audio.play();
        }

        document.addEventListener("DOMContentLoaded", function() {
          playSound("../Profile/siapa.mp3");
        });
      </script>';
} else {
    // check if the password is correct
    echo "USERNAME ada di database<br />";
    echo "Password yang di input di form login: " . $password;
    echo "<br />Password yang tersimpan di database: " . $row['password'];
    if (!password_verify($password, $row['password'])) {
        echo "Wrong password";
    } else {
        session_start();
        // Login success, set SESSION DATA
        $_SESSION['user_id'] = $row['id'];
        // $_SESSION['user_role'] = $row['role'];
        $_SESSION['username'] = $row['username'];
        header('location: ../TDL/tempt.php');
    }
}

