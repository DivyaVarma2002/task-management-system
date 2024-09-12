<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form action="add_task.php" method="POST">
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" required><br>

        <label for="task_description">Description:</label>
        <textarea id="task_description" name="task_description" required></textarea><br>

        <label for="due_date">Due Date:</label>
        <input type="date" id="due_date" name="due_date" required><br>

        <input type="submit" value="Add Task">
    </form>
</body>
</html>
