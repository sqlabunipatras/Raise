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

//stores url properties in variables
$idAvatar =  $_GET["idAvatar"];
$lang = $_GET["lang"];

//$room = $_GET["room"];
// if id and lang are set find id 
if(isset($idAvatar ) && isset($lang))
{
	 // find id in db
	 $myQuery = "SELECT * FROM UserAccounts WHERE `PrincipalID`='$idAvatar'";
	 $result = mysqli_query($conn,$myQuery) or die('Error searching the avatar');
	 
	 if (mysqli_num_rows($result) == 1) 
     {	  
	 // Puts, updates the lang in the table 
	 $myQuery ="UPDATE UserAccounts SET lang ='$lang' WHERE PrincipalID ='$idAvatar'";
		 if ($conn->query($myQuery) === false) 
		 {
		 echo "Error updating record: " . $conn->error;
		 } else if($conn->query($myQuery)=== true &&  $lang === "01"){
           echo "You have successfully chosen English as your language
Click!";
         } else if($conn->query($myQuery)=== true &&  $lang === "02"){
           echo "Έχετε επιλέξει τα Ελληνικά ως την γλώσσα επιλογή σας
Πατήστε!";
         } else if($conn->query($myQuery)=== true &&  $lang === "03"){
           echo "Você escolheu com sucesso o português como seu idioma.
Clique";
         } else if($conn->query($myQuery)=== true &&  $lang === "04"){
           echo "Hai scelto con successo l'inglese come lingua
Clic";
         }
     }
  
  /*
  if (mysqli_num_rows($result) == 0) 
  {
	  
  // Inserts id and lang in the table 
	$myQuery = "INSERT INTO useraccounts (PrincipalID, lang)
	VALUES ('$idAvatar', '$lang')";
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
  
// Returns the lang value stored in the table 
if(isset($idAvatar ) && !isset($lang))
	{
      $myQuery = "SELECT * FROM UserAccounts WHERE `PrincipalID`='$idAvatar'";
      $result = mysqli_query($conn,$myQuery) or die('Error getting the language for  this avatar');
      $row = mysqli_fetch_assoc($result);
      echo $row["lang"];
    }

mysqli_close($conn);
?>



















































<?php
//simple connection test
/*
$servername = "localhost";
$username = "opensim";
$password = "opensim";
$db = 'oslangdatadb';
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
*/
?>
