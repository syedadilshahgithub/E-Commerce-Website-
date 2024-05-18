<?php
/*
this file contains database configuration assuming you runnig mysql using "root" and password " "
*/
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','login');

//try connect to the database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//check the conection
if($conn == false){
    dir('Error: Cannot connect');
}


?>