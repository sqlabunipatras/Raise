<?php
$servername = 'mariadb';
$username = 'root';
$password = 'mariadb';
$dbname = 'divaopensim';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get room value from POST request
$room = $_GET["room"] ?? '';

// Prepare and execute the SQL query
// Query to count the number of users whose room starts with the value in $oom
$sql = "SELECT * FROM UserAccounts WHERE CAST(room AS CHAR) LIKE ?";
$likeParam = $room . "%"; // append % to the $room value
$stmt = $conn->prepare($sql);

if(!$stmt) {
    die("Preparation failed: " . $conn->error);
}

$stmt->bind_param("s", $likeParam); // "i" means we're binding an integer

if(!$stmt->execute()) {
    die("Execution failed: " . $stmt->error);
}

$result = $stmt->get_result();

// while($row = $result->fetch_assoc()) {
//     $rows[] = array('PrincipalID' => $row['PrincipalID'], 'lang' => $row['lang']);
// }

$row = $result->fetch_assoc();

echo json_encode([$row["PrincipalID"], $row["lang"]], true);

$stmt->close();
$conn->close();
?>