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
$telemetryClient->getContext()->setInstrumentationKey('d7b5c22e-00e1-424a-8d25-c0b2127c763d');


// setup for correct data correlations
$telemetryClient->getContext()->getOperationContext()->setId('XX');
$telemetryClient->getContext()->getOperationContext()->setName('GET Index');


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

$telemetryClient->trackDependency('SQL1', "SQL", 'SELECT * from neco', null,  $durationService);
$telemetryClient->trackDependency('SQL2', "SQL", 'SELECT * from neco', null, $durationService);
$telemetryClient->trackDependency('SQL3', "SQL", 'SELECT * from neco', null, $durationService);

$telemetryClient->trackDependency('SQL3', \ApplicationInsights\Channel\Contracts\Dependency_Type::SQL, 'SELECT * from neco', $durationService);

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
