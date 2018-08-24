<html>
<body>

<h1>JJ Web PHP website</h1>
<h3>using Application Insights v2</h3>

<?php
/**
 *  Does server-side instrumentation using the PHP SDK for Application Insights
 */

require_once 'vendor/autoload.php';

$telemetryClient = new \ApplicationInsights\Telemetry_Client();
$telemetryClient->getContext()->setInstrumentationKey('0c68ddde-8a99-4f53-ad47-1a8c854e51cf');


// send server request
$duration = 5;
$url = "http:\\phpsite";
$requestName = "IndexPage";
$startTime = time();
$duration = rand(1, 10);
if ($duration > 5)
    $success = false;    
else
    $success = true;
$telemetryClient->trackRequest($requestName, $url, $startTime, $duration, http_response_code(), $success);

// track dependency calls
$durationService = rand(1, 20);
$telemetryClient->trackDependency('JJWebService', \ApplicationInsights\Channel\Contracts\Dependency_Type::HTTP, 'Service Command', $durationService, 23, $success, 200);

// catch exception
try
{
    throw new Exception('JJ exception');
}
catch (Exception $e)
{
    $telemetryClient->trackException($e);
}

//$telemetryClient->trackEvent('Objednano, PHP container name: ' . gethostname());

$telemetryClient->flush();

echo gethostname(); // docker name
?>

</body>

</html> 
