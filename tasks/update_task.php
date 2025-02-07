<?php
require '../config/session_check.php';
require '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task_id']) && isset($_POST['status'])) {
    $task_id = $_POST['task_id'];
    $status = $_POST['status'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("UPDATE tasks SET status = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("sii", $status, $task_id, $user_id);

    if ($stmt->execute()) {
        header("Location: ../dashboard/tasks.php");
        exit();
    } else {
        echo "Error updating task.";
    }
    $stmt->close();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $task_id = $_GET['id'];
} else {
    die("Invalid task ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Task</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <h2>Update Task Status</h2>
    <form method="POST">
        <input type="hidden" name="task_id" value="<?php echo htmlspecialchars($task_id); ?>">
        <select name="status">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
        <button type="submit">Update</button>
    </form>
    <a href="../dashboard/tasks.php">Back to Tasks</a>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
