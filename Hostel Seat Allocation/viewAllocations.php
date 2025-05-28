<?php
include 'db.php';
$sql = "SELECT a.id, s.name, s.email, r.room_number, a.allocated_at
        FROM allocations a
        JOIN students s ON a.student_id = s.id
        JOIN rooms r ON a.room_id = r.id";
$result = mysqli_query($conn, $sql);
echo "<table border='1'><tr><th>Student</th><th>Email</th><th>Room</th><th>Allocated At</th></tr>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['room_number']}</td>
        <td>{$row['allocated_at']}</td>
    </tr>";
}
echo "</table>";
?>