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

$sqllang = "ALTER TABLE UserAccounts ADD COLUMN IF NOT EXISTS lang TINYINT(4) NOT NULL DEFAULT 0";
$sqlroom = "ALTER TABLE UserAccounts ADD COLUMN IF NOT EXISTS room INT(11) NOT NULL DEFAULT 0";
$sqlrole = "ALTER TABLE UserAccounts ADD COLUMN IF NOT EXISTS role_id TINYINT(4) NOT NULL DEFAULT 0";
// $sql_selected_item = "ALTER TABLE prims ADD COLUMN IF NOT EXISTS end_House_explorer TINYINT(4) NOT NULL DEFAULT 0";


if (mysqli_query($conn, $sqllang)) {
	echo "Table UserAccounts created successfully the column lang";
  } else {
	echo "Error creating table: " . mysqli_error($conn);
  }

if (mysqli_query($conn, $sqlroom)) {
	echo "Table UserAccounts created successfully the column room";
  } else {
	echo "Error creating table: " . mysqli_error($conn);
  }

if (mysqli_query($conn, $sqlrole)) {
	echo "Table UserAccounts created successfully the column role_id";
  } else {
	echo "Error creating table: " . mysqli_error($conn);
  }

// if (mysqli_query($conn, $sql_selected_item)) {
//   echo "Table prims created successfully the column selected_item_flag";
// } else {
//   echo "Error creating table: " .mysqli_error($conn);
// }


mysqli_close($conn);

?>