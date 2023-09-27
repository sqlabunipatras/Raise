<?php
$servername = 'mariadb';
$username = 'root';
$password = 'mariadb';
$dbname = 'divaopensim';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$idAvatar = $_GET['idAvatar'] ?? null;

if(isset($idAvatar)) {
    $stmt = $conn->prepare("SELECT lang, role_id FROM UserAccounts WHERE PrincipalID = ?");
    $stmt->bind_param("s", $idAvatar);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Return the values as comma-separated
    echo $row["lang"] . "," . $row["role_id"];
}

$conn->close();
?>