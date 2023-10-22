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

<!DOCTYPE html>
<html lang="en">

<!-- Rest of your HTML code -->

<body>

    <!-- Add Task Form -->
    <div class="container-fluid pt-3" style="text-align: center; margin: 0 auto;">
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
    </div>

    <!-- Task List -->
    <div class="container-fluid pt-3" style="text-align: center; margin: 0 auto;">
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Priority</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($baris = $hasil->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $baris['priority'] . "</td>";
                            echo "<td>" . $baris['tugas'] . "</td>";
                            echo "<td>" . $baris['status'] . "</td>";
                            echo "<td>";
                            echo "<a href='edit_task.php?id=" . $baris['id'] . "'>Edit</a> | ";
                            echo "<a href='delete_task.php?id=" . $baris['id'] . "'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Progress Page -->
    <div class="container-fluid pt-3" style="text-align: center; margin: 0 auto;">
        <h2>Progress Page</h2>
        <select id="progressDropdown">
            <option value="not_started">Not Yet Started</option>
            <option value="in_progress">In Progress</option>
            <option value="waiting_on">Waiting On</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <script>
        // Add event listener to the progress dropdown
        document.getElementById('progressDropdown').addEventListener('change', function() {
            // Handle progress selection here
            console.log('Selected progress:', this.value);
        });
    </script>

</body>

</html>
