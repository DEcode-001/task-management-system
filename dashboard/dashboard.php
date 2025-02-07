<?php
require '../config/session_check.php';
require '../includes/header.php';
?>

<h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
<a href="../tasks/tasks.php">Manage Tasks</a>
<a href="../auth/logout.php">Logout</a>

<?php require '../includes/footer.php'; ?>
