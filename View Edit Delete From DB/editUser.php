<?php
include 'connectDB.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $user = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: view_users.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
    Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
    <button type="submit">Update</button>
</form>