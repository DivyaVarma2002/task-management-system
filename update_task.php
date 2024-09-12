<?php
$conn = new mysqli("localhost", "root", "", "task-management-system");

$id = $_GET['id'];
$task_name = $_POST['task_name'];
$task_description = $_POST['task_description'];
$due_date = $_POST['due_date'];

$sql = "UPDATE tasks SET task_name='$task_name', task_description='$task_description', due_date='$due_date' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Task updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
