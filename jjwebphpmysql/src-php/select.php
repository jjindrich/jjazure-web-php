<?php
require("config.inc.php");

for ($i = 1; $i <= 10; $i++) {
    $time_start = microtime(true);
    //Establishes the connection
    $conn = mysqli_init();

    //The connection must be configured with SSL for redirection test
    //mysqli_ssl_set($conn,NULL,NULL, "BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ;
    //mysqli_real_connect ($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);
    //if (!$link) {
    //    die ('Connect error (' . mysqli_connect_errno() . '): ' . mysqli_connect_error() . "\n");
    //}

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
