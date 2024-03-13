<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class UmiditaController {

        function show (Request $request, Response $response, $args) {
        
            $i = new impianto("Impianto1", "100", "300");
            
            $response->getBody()->write(json_encode($i->show("umidita")));
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }
    
    
    
        function search (Request $request, Response $response, $args) {
    
            $i = new impianto("Impianto1", "100", "300");
    
            $response->getBody()->write(json_encode($i->search($args["identificativo"])));
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }


        function misu (Request $request, Response $response, $args) {
    
            $R = new RilevatoreDiUmidita("umidita", "123");
            $R -> set_posizione("terra");
    
            $response->getBody()->write(json_encode($R->misu()));
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }

        function valmin (Request $request, Response $response, $args) {
    
            $R = new RilevatoreDiUmidita("umidita", "123");
            $R -> set_posizione("terra");
    
            $response->getBody()->write(json_encode($R->valmin($args)));
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }

    }

?>