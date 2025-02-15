<?php
session_start();
require '../config/config.php';
require '../config/session_check.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM tasks WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tasks</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    
    <div class="container">
        <h2>Manage Your Tasks</h2>
        <a href="add_task.php">Add Task</a>
        
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['task_description']) ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <a href="update_task.php?id=<?= $row['id'] ?>">Edit</a> | 
                    <a href="delete_task.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete task?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
