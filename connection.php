<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="db_supreme";

// Create connection
$supreme = new mysqli($servername, $username, $password,$database);

// Check connection
if ($supreme->connect_error) {
  die("Connection failed: " . $supreme->connect_error);
}
// echo "Connected successfully";
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="db_dialdesk";

// Create connection
$dialdesk = new mysqli($servername, $username, $password, $database);

// Check connection
if ($dialdesk->connect_error) {
  die("Connection failed: " . $dialdesk->connect_error);
}
// echo "Connected successfully";
?>  
