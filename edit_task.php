<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php
// Fetch the task by id
$conn = new mysqli("localhost", "root", "", "task-management-system");
$id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id = $id";
$result = $conn->query($sql);
$task = $result->fetch_assoc();
?>

<form action="update_task.php?id=<?= $id ?>" method="POST">
    <label for="task_name">Task Name:</label>
    <input type="text" id="task_name" name="task_name" value="<?= $task['task_name'] ?>" required><br>

    <label for="task_description">Description:</label>
    <textarea id="task_description" name="task_description" required><?= $task['task_description'] ?></textarea><br>

    <label for="due_date">Due Date:</label>
    <input type="date" id="due_date" name="due_date" value="<?= $task['due_date'] ?>" required><br>

    <input type="submit" value="Update Task">
</form>

</body>
</html>
