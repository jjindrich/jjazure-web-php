<?php
// src/Controller/TestController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Psr\Log\LoggerInterface;

class TestControllerDELETE
{
    public function index(LoggerInterface $logger): Response
    {

        $logger->info('We are logging!');  
              
        return new Response('<html><body>JJ DELETE</body></html>');        
    }
}
