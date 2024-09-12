<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Task List</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "task-management-system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tasks ORDER BY due_date ASC";
$result = $conn->query($sql);

echo "<h1>Your Task List</h1>";
echo "<table>";
echo "<tr><th>Task Name</th><th>Description</th><th>Due Date</th><th>Actions</th></tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["task_name"] . "</td>";
        echo "<td>" . $row["task_description"] . "</td>";
        echo "<td>" . $row["due_date"] . "</td>";
        echo "<td>
                <a href='edit_task.php?id=" . $row["id"] . "'>Edit</a> | 
                <a href='delete_task.php?id=" . $row["id"] . "' onclick=\"return confirm('Are you sure you want to delete this task?');\">Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No tasks found</td></tr>";
}
echo "</table>";

// Add Task Button
echo "<div style='margin-top: 20px;'>";
echo "<a href='add_task_form.php'><button style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;'>Add Task</button></a>";
echo "</div>";

$conn->close();
?>

</body>
</html>
