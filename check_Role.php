<?php
$servername = 'mariadb';
$username = 'root';
$password = 'mariadb';
$dbname = 'divaopensim';

$results = [];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$result = $conn->query("SELECT r.role_id, COALESCE(u.count_users, 0) AS count_users FROM (SELECT 1 AS role_id UNION ALL SELECT 2 AS role_id UNION ALL SELECT 3 AS role_id) AS r LEFT JOIN (SELECT role_id, COUNT(*) AS count_users FROM UserAccounts WHERE role_id IN (1, 2, 3) GROUP BY role_id ) AS u ON r.role_id = u.role_id");

if (mysqli_num_rows($result) > 1)
{
    while ($row = mysqli_fetch_assoc($result)) {
      $role_id = $row['role_id'];
      $count_users = $row['count_users'];
      $results[$role_id] = $count_users;
      // $row = mysqli_fetch_assoc($result);
      // echo $row['count_users'];
    }   

    // Generate a comma-separated string of the results
    $resultString = implode(",", $results);

    echo json_encode($results);
    // Echo the result string
    // echo $resultString;
}
else 
{
    echo "No users have assigned roles";
}

mysqli_close($conn);
?>
