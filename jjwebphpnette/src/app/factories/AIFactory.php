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
		$this->aicontext->setInstrumentationKey('4d4abe90-adbf-45c0-82f7-ada5304b1625');
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
