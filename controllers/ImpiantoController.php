<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class ImpiantoController {

        function info (Request $request, Response $response, $args) {
        
            $impianto = new impianto("Impianto1", "100", "300");
    
            $response->getBody()->write(json_encode($impianto));
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }
    }

?>