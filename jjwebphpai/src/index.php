<html>
<body>

<h1>JJ Web PHP website</h1>
<h3>using Application Insights</h3>

<?php
require_once 'vendor/autoload.php';

$telemetryClient = new \ApplicationInsights\Telemetry_Client();
$telemetryClient->getContext()->setInstrumentationKey('KEY');
$telemetryClient->trackEvent('PHP container name: ' . gethostname());
$telemetryClient->flush();
$telemetryClient->trackRequest('myRequest', 'http://jj', time());
$telemetryClient->flush();

echo gethostname(); // docker name
?>

</body>
</html> 
