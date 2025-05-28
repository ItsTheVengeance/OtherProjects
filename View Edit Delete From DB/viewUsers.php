<?php
include 'connectDB.php';
$result = mysqli_query($conn, "SELECT * FROM users");
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>
            <a href='edit_user.php?id={$row['id']}'>Edit</a> | 
            <a href='delete_user.php?id={$row['id']}'
               onclick=\"return confirm('Are you sure?');\">Delete</a>
        </td>
    </tr>";
}
echo "</table>";
?>