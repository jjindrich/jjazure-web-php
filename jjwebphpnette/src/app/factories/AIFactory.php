<?php

declare(strict_types=1);

class AIFactory
{
    private $telemetryClient;
    private $aicontext;

    function __construct()
    {
        $this->telemetryClient = new \ApplicationInsights\Telemetry_Client();
		$this->aicontext = $this->telemetryClient->getContext();
		$this->aicontext->setInstrumentationKey('93dbbce2-517a-4141-83ad-0b0a0b0db7d9');
		$this->aicontext->getSessionContext()->setId(session_id());
    }

    function getTelemetryClient()
    {
        return $this->telemetryClient;
    }

    function getContext()
    {
        return $this->aicontext;
    }
}
