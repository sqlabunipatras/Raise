<?php
$servername = "mariadb";
$username = "root";
$password = "mariadb";
$dbname = "divaopensim";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the objectKey form the GET request
if (isset($_GET['objectKey'])) {
    $objectKey = $_GET['objectKey'];

    // Prepare and execute the SQL query
    $sql = "SELECT end_House_explorer FROM prims WHERE UUID = '$objectKey'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result && $result->num_rows > 0) {
        //Fetch the result and echo the end_House_explorer value
        $row = $result->fetch_assoc();
        echo $row['end_House_explorer'];
    } else {
        // If no matching record was found, echo an error message
        echo 'Object not found.';
    }
} else {
    // If objectKey parameter is missing, echo an error message
    echo 'Object key not provided.';
}

$conn->close();
?>