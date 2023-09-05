<?php
require("config.inc.php");

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

// Run the create table query
if (mysqli_query($conn, '
CREATE TABLE Products (
'Id' INT NOT NULL AUTO_INCREMENT ,
'ProductName' VARCHAR(200) NOT NULL ,
'Color' VARCHAR(50) NOT NULL ,
'Price' DOUBLE NOT NULL ,
PRIMARY KEY ('Id')
);
')) {
printf("Table created\n");

//Close the connection
mysqli_close($conn);
?>
