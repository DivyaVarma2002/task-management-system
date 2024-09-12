<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task-management-system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $due_date = $_POST['due_date'];

    // Validate inputs
    if (!empty($task_name) && !empty($task_description) && !empty($due_date)) {
        $sql = "INSERT INTO tasks (task_name, task_description, due_date) 
                VALUES ('$task_name', '$task_description', '$due_date')";

        if ($conn->query($sql) === TRUE) {
            echo "New task added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please fill all fields.";
    }
}

$conn->close();
?>
