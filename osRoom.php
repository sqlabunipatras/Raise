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
//$lang = $_GET['lang'];
$room = $_GET['room'];


if(isset($idAvatar ) && isset($room))
{
 $myQuery = "SELECT * FROM UserAccounts WHERE PrincipalID='$idAvatar'";
 $result = mysqli_query($conn, $myQuery) or die('Error searching the avatar');

  if (mysqli_num_rows($result) == 1)
  {
        $row = mysqli_fetch_assoc($result);
        if ($room == 'reset')//If I have sent the reset value for room
        {
                $myQuery = "UPDATE UserAccounts SET room = 0 WHERE PrincipalID = '$idAvatar'";
                if ($conn->query($myQuery) === false)
                {
                    echo 'Error updating record: ' . $conn->error;
                }
                echo 'reset';
        }
        elseif ($room > $row['room'])
                $myQuery ="UPDATE UserAccounts SET room ='$room' WHERE PrincipalID ='$idAvatar'";
        	     if ($conn->query($myQuery) === false) 
			     {
    			  echo "Error updating record: " . $conn->error;
  			     }
}
  /*
  if (mysqli_num_rows($result) == 0)
  {

  // Inserts id and lang in the table
        $myQuery = "INSERT INTO UserAccounts (PrincipalID, room)
        VALUES ('$idAvatar', '$room')";
        if (mysqli_query($conn, $myQuery))
        {

        }

        else
        {
    echo "Error: " . $myQuery . "<br>" . mysqli_error($conn);
        }
  }
  */
}
// Returns the room value stored in the table
if(isset($idAvatar) && !isset($room))
{
    $myQuery = "SELECT room FROM UserAccounts WHERE PrincipalID = '$idAvatar'";
    $result = mysqli_query($conn, $myQuery) or die('Error getting the room for this avatar');

    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
        echo $row['room'];
    }
}

mysqli_close($conn);
?>
  