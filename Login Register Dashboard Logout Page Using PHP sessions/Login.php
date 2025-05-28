<?php
session_start();
include 'connectDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: Dashboard.php");
        exit;
    } else {
        $msg = "Invalid email or password.";
    }
}
?>
<form method="post">
    Email: <input name="email" type="email" required><br>
    Password: <input name="password" type="password" required><br>
    <button type="submit">Login</button>
</form>
<?php if (isset($msg)) echo "<p>$msg</p>"; ?>
<p>Don't have an account? <a href="userRegistration.php">Register</a></p>