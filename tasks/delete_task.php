<?php
require '../config/session_check.php';
require '../config/config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $task_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $task_id, $user_id);

    if ($stmt->execute()) {
        header("Location: ../dashboard/tasks.php");
        exit();
    } else {
        echo "Error deleting task.";
    }
    $stmt->close();
} else {
    echo "Invalid task ID.";
}
?>
