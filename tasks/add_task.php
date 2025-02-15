<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../config/config.php';
require '../config/session_check.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_description = $_POST['task_description'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO tasks (user_id, task_description, status) VALUES (?, ?, 'Pending')");
    $stmt->bind_param("is", $user_id, $task_description);

    if ($stmt->execute()) {
        header("Location: tasks.php");
        exit();
    } else {
        echo "Error adding task!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Add New Task</h2>
        <form method="POST">
            <label>Task Description:</label><br>
            <textarea name="task_description" required></textarea><br>
            <button type="submit" class="button">Add Task</button>
        </form>
    </div>
</body>
</html>
