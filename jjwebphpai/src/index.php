<html>
<body>

<h1>JJ Web PHP website</h1>
<h3>using Application Insights v2</h3>

<?php
require_once 'vendor/autoload.php';

$telemetryClient = new \ApplicationInsights\Telemetry_Client();
$telemetryClient->getContext()->setInstrumentationKey('c93bf2f8-7ea5-4c11-b2c8-dde440b3bd57');

$telemetryClient->trackEvent('Objednano, PHP container name: ' . gethostname());


$telemetryClient->trackRequest('myRequest', 'http://jj', time());

$telemetryClient->trackDependency('Whatever Service', \ApplicationInsights\Channel\Contracts\Dependency_Type::OTHER, 'Service Command', time(), 23, true);

$telemetryClient->flush();

echo gethostname(); // docker name
?>

</body>

<script type="text/javascript">  var appInsights=window.appInsights||function(a){    function b(a){c[a]=function(){var b=arguments;c.queue.push(function(){c[a].apply(c,b)})}}var c={config:a},d=document,e=window;setTimeout(function(){var b=d.createElement("script");b.src=a.url||"https://az416426.vo.msecnd.net/scripts/a/ai.0.js",d.getElementsByTagName("script")[0].parentNode.appendChild(b)});try{c.cookie=d.cookie}catch(a){}c.queue=[];for(var f=["Event","Exception","Metric","PageView","Trace","Dependency"];f.length;)b("track"+f.pop());if(b("setAuthenticatedUserContext"),b("clearAuthenticatedUserContext"),b("startTrackEvent"),b("stopTrackEvent"),b("startTrackPage"),b("stopTrackPage"),b("flush"),!a.disableExceptionTracking){f="onerror",b("_"+f);var g=e[f];e[f]=function(a,b,d,e,h){var i=g&&g(a,b,d,e,h);return!0!==i&&c["_"+f](a,b,d,e,h),i}}return c    }({        instrumentationKey:"c93bf2f8-7ea5-4c11-b2c8-dde440b3bd57"    });      window.appInsights=appInsights,appInsights.queue&&0===appInsights.queue.length&&appInsights.trackPageView();</script>

<!-- To collect end-user usage analytics about your application, insert the following script into each page you want to track. Place this code immediately before the closing </head> tag, and before any other scripts. Your first data will appear automatically in just a few seconds. --> <script type="text/javascript"> var appInsights=window.appInsights||function(a){ function b(a){c[a]=function(){var b=arguments;c.queue.push(function(){c[a].apply(c,b)})}}var c={config:a},d=document,e=window;setTimeout(function(){var b=d.createElement("script");b.src=a.url||"https://az416426.vo.msecnd.net/scripts/a/ai.0.js",d.getElementsByTagName("script")[0].parentNode.appendChild(b)});try{c.cookie=d.cookie}catch(a){}c.queue=[];for(var f=["Event","Exception","Metric","PageView","Trace","Dependency"];f.length;)b("track"+f.pop());if(b("setAuthenticatedUserContext"),b("clearAuthenticatedUserContext"),b("startTrackEvent"),b("stopTrackEvent"),b("startTrackPage"),b("stopTrackPage"),b("flush"),!a.disableExceptionTracking){f="onerror",b("_"+f);var g=e[f];e[f]=function(a,b,d,e,h){var i=g&&g(a,b,d,e,h);return!0!==i&&c["_"+f](a,b,d,e,h),i}}return c }({ instrumentationKey:"c93bf2f8-7ea5-4c11-b2c8-dde440b3bd57" }); window.appInsights=appInsights,appInsights.queue&&0===appInsights.queue.length&&appInsights.trackPageView(); </script>
</html> 
