<?php
require 'vendor/autoload.php';

// Replace with your connection details
$redis = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => 'jjredis.redis.cache.windows.net',
    'port'   => 6379,
    'password' => '<KEY>',
    'ssl' => true,
]);

// Measure the time taken by the set command
$start = microtime(true);
$redis->set('jjkey', 'jj');
$timeTaken = microtime(true) - $start;
echo "Time taken by set command: " . $timeTaken . " seconds\n";

// Measure the time taken by the get command
$start = microtime(true);
$value = $redis->get('jjkey');
$timeTaken = microtime(true) - $start;
echo "Time taken by get command: " . $timeTaken . " seconds\n";

echo "returned value:" . $value;
?>