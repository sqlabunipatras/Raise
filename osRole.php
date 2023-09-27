<?php
$servername = 'mariadb';
$username = 'root';
$password = 'mariadb';
$dbname = 'divaopensim';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

//stores url properties in variables
$idAvatar =  $_GET['idAvatar'];
$role = $_GET['role'];

//echo "Hello, idAvatar: " . $idAvatar . ", role: " . $role . "<br>";

if(isset($idAvatar) && isset($role))
{
    $result = $conn->query("SELECT role_id FROM UserAccounts WHERE PrincipalID='$idAvatar'");
    if (mysqli_num_rows($result) == 1)
    {
        
        $row = mysqli_fetch_assoc($result);
        if ($role == 'reset')
        {
            if($conn->query("UPDATE UserAccounts SET role_id = 0 WHERE PrincipalID = '$idAvatar'") == false)
            {
                die("Error in updating data into UserAccounts table: " . $db->error);
            }
            echo "reset";
        }
        else
        {
            if($conn->query("UPDATE UserAccounts SET role_id ='$role' WHERE PrincipalID = '$idAvatar'") == false)
            {
                die("Error in updating data into UserAccounts table: " . $db->error);
            }
        }
    }
}
elseif (isset($idAvatar) && !isset($role))
{
    $result = $conn->query("SELECT role_id FROM UserAccounts WHERE PrincipalID = '$idAvatar'");
    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
        echo $row['role_id'];
    }
}

mysqli_close($conn);
?>