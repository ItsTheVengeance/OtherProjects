<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit;
}
?>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
<p>This is your dashboard.</p>
<a href="Logout.php">Logout</a>