<?php
define('DB_SERVER', '####');
define('DB_USERNAME', '####');
define('DB_PASSWORD', '####');
define('DB_NAME', '####');
 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>