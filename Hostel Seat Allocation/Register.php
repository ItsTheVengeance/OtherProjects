<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful. <a href='Allocate.php'>Proceed to Seat Allocation</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<form method="post">
    Name: <input name="name" required><br>
    Email: <input name="email" type="email" required><br>
    <button type="submit">Register</button>
</form>