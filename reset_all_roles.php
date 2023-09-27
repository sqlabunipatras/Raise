<?php
$servername = 'mariadb';
$username = 'root';
$password = 'mariadb';
$dbname = 'divaopensim';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . mysqli_connect_error());
}

//Execute the SQL command
if ($conn->query("UPDATE UserAccounts SET role_id = 0, room = 0 WHERE role_id <> 0") === TRUE) {
    echo "Role IDs updated sucessfully.";
} else {
    echo "Error updating role IDs: " . $conn->error;
}

$conn->close();
?>