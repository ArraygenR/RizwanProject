<?php define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'arrayg40_healthyways');
define('DB_PASSWORD', 'healthyways123$');
define('DB_DATABASE', 'arrayg40_healthyways');
//$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); 
date_default_timezone_set('Asia/Kolkata');
// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
