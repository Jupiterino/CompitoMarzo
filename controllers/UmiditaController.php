<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class UmiditaController {

        function show (Request $request, Response $response, $args) {
        
            $Ril = new RilevatoreDiUmidita("umidita","123");
    
            $response->getBody()->write($Ril->json_encode());
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }
    
    
    
        function search (Request $request, Response $response, $args) {
    
            
    
            $response->getBody()->write($Ril->json_encode());
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }

        function search (Request $request, Response $response, $args) {
    
            $classe = new Classe();
            $alunno = $classe->search($args['nome']);
    
            if($alunno) {
    
                $message = $alunno -> toString();
            }
    
            else {
    
                $message = "Alunno inesitente";
            }
    
            $response->getBody()->write($message);
            return $response;
    
        }
        


        function createAlunno (Request $request, Response $response, $args) {

            $body = $request->getBody()->getContents();
            $params = json_decode($body, true);

            $alunno = new Alunno();
            $alunno->set_nome($params["nome"]);
            $alunno->set_cognome($params["cognome"]);
            $alunno->set_eta($params["eta"]);
            
        
            $response->getBody()->write(json_encode($alunno));
            return $response->withHeader("Content-Type", "application/json")->withStatus(201);

        }


        function updateAlunno (Request $request, Response $response, $args) {

            $body = $request->getBody()->getContents();
            $params = json_decode($body, true);

            $classe = new Classe();
            $alunno = $classe->search($args["nome"]);

            $alunno->set_nome($params["nome"]);
            $alunno->set_cognome($params["cognome"]);


            $alunno->set_eta($params["eta"]);

            $response->getBody()->write(json_encode($alunno));
            return $response->withHeader("Content-Type", "application/json")->withStatus(204);

        }


        function deleteAlunno (Request $request, Response $response, $args) {

            $body = $request->getBody()->getContents();
            $params = json_decode($body, true);

            $classe = new Classe();
            $classe->delete($args["nome"]);
            $c = json_encode($classe);
            $response->getBody()->write($c);
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);

        }

    }

?>