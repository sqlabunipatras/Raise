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
$room = $_GET["room"];
$idAvatar = $_GET['idAvatar'];

// Prepare and execute the SQL query
// Query to count the number of users whose room starts with the value in $oom
$sql = "SELECT COUNT(*) as count FROM UserAccounts WHERE CAST(room AS CHAR) LIKE ?";
$likeParam = $room . "%"; // append % to the $room value
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $likeParam); // "i" means we're binding an integer

$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

if(isset($idAvatar))
{

  $sql_ = "SELECT * FROM UserAccounts WHERE PrincipalID = ? ";
  $stmt_ = $conn->prepare($sql_);
  $stmt_->bind_param("s", $idAvatar); // "s" denotes a string

  $stmt_->execute();
  $result_ = $stmt_->get_result();

  if($result_->num_rows > 0)
  {
    $row_ = $result_->fetch_assoc();  
  }
}

echo json_encode([$row["count"], $row_["PrincipalID"], $row_["lang"], $row_["role_id"]], true);

$stmt->close();
$stmt_->close();
$conn->close();
?>