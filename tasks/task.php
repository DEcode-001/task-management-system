<?php
session_start();
require '../config/config.php';
require '../config/session_check.php';

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

if ($role == 'admin') {
    $stmt = $conn->prepare("SELECT tasks.id, users.name, tasks.task_description, tasks.status FROM tasks INNER JOIN users ON tasks.user_id = users.id");
} else {
    $stmt = $conn->prepare("SELECT id, task_description, status FROM tasks WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Tasks</title>
</head>
<body>
    <h2><?= ($role == 'admin') ? "All Users' Tasks" : "Your Tasks"; ?></h2>
    <table border="1">
        <tr>
            <?php if ($role == 'admin') echo "<th>User</th>"; ?>
            <th>ID</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <?php if ($role == 'admin') echo "<td>" . htmlspecialchars($row['name']) . "</td>"; ?>
            <td><?= htmlspecialchars($row['id']); ?></td>
            <td><?= htmlspecialchars($row['task_description']); ?></td>
            <td><?= htmlspecialchars($row['status']); ?></td>
            <td>
                <a href="update_task.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="delete_task.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
