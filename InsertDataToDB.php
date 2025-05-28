<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstname = "Manish";
$lastname = "Bordhan";
$email = "manish.bordhan@gmail.com";

$sql = "INSERT INTO Profiles (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>