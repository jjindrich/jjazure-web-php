<html>
<body>

<h1>JJ Web PHP website</h1>

<?php
require_once 'vendor/autoload.php';

$telemetryClient = new \ApplicationInsights\Telemetry_Client();
$telemetryClient->getContext()->setInstrumentationKey('fd8d72f8-7eb0-4227-bfc0-1d660cf8620f');
$telemetryClient->trackEvent('PHP container name: ' . gethostname());
$telemetryClient->flush();
$telemetryClient->trackRequest('myRequest', 'http://jj', time());
$telemetryClient->flush();

echo gethostname(); // docker name
?>

</body>
</html> 
