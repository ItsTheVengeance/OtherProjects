<?php
include 'db.php';

$students = mysqli_query($conn, "SELECT * FROM students");

$rooms = mysqli_query($conn, "SELECT * FROM rooms WHERE allocated < capacity");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = intval($_POST['student_id']);
    $room_id = intval($_POST['room_id']);

    $alloc = "INSERT INTO allocations (student_id, room_id) VALUES ($student_id, $room_id)";
    $update = "UPDATE rooms SET allocated = allocated + 1 WHERE id = $room_id";
    if (mysqli_query($conn, $alloc) && mysqli_query($conn, $update)) {
        echo "Seat allocated successfully!";
    } else {
        echo "Allocation failed.";
    }
}
?>
<form method="post">
    Student:
    <select name="student_id" required>
        <?php while($s = mysqli_fetch_assoc($students)) echo "<option value='{$s['id']}'>{$s['name']} ({$s['email']})</option>"; ?>
    </select><br>
    Room:
    <select name="room_id" required>
        <?php while($r = mysqli_fetch_assoc($rooms)) echo "<option value='{$r['id']}'>Room {$r['room_number']} (Available: " . ($r['capacity']-$r['allocated']) . ")</option>"; ?>
    </select><br>
    <button type="submit">Allocate Seat</button>
</form>