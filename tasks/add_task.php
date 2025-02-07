<?php
session_start();
require '../config/config.php';
require '../config/session_check.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $task_description = trim($_POST['task_description']);

    if (!empty($task_description)) {
        $stmt = $conn->prepare("INSERT INTO tasks (user_id, task_description, status) VALUES (?, ?, 'Pending')");
        $stmt->bind_param("is", $user_id, $task_description);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = "Task added successfully!";
        } else {
            $_SESSION['error'] = "Failed to add task.";
        }
    } else {
        $_SESSION['error'] = "Task description cannot be empty.";
    }
    header("Location: tasks.php");
    exit;
}
?>
