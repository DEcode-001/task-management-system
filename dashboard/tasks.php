<?php
require '../config/session_check.php';
require '../includes/header.php';
require '../config/config.php';

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM tasks WHERE user_id = $user_id");
?>

<h2>Your Tasks</h2>
<a href="../tasks/add_task.php">Add Task</a>

<ul>
    <?php while ($task = $result->fetch_assoc()): ?>
        <li><?php echo $task['task_description']; ?> 
            <a href="../tasks/update_task.php?id=<?php echo $task['id']; ?>">Edit</a>
            <a href="../tasks/delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
        </li>
    <?php endwhile; ?>
</ul>

<?php require '../includes/footer.php'; ?>
