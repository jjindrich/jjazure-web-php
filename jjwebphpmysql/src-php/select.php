<?php
require("config.inc.php")

for ($i = 1; $i <= 10; $i++) {
    $time_start = microtime(true);
    //Establishes the connection
    $conn = mysqli_init();
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
    if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: '.mysqli_connect_error());
    }
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    echo "Connected in $time seconds\n";

    $time_start = microtime(true);
    //Run the Select query
    //printf("Reading data from table... \n");
    $res = mysqli_query($conn, 'SELECT * FROM Products');
    while ($row = mysqli_fetch_assoc($res)) {
    var_dump($row);
    }
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    //echo "Query in $time seconds\n";
}

//Close the connection
mysqli_close($conn);
?>
