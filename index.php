<?php

    use Slim\Factory\AppFactory;

    require __DIR__ . '/vendor/autoload.php';

    spl_autoload_register(function($class){
        
        if(file_exists("./models/$class.php"))
            require_once("./models/$class.php");

        else if(file_exists("./controllers/$class.php"))
            require_once("./controllers/$class.php");

    });


    $app = AppFactory::create();
    

    $app->get('/impianto', 'ImpiantoController:info');

    $app->get('/rilevatori_di_umidita', 'UmiditaController:show');
    $app->get('/rilevatori_di_umidita/{identificativo}', 'UmiditaController:search');
    $app->get('/rilevatori_di_umidita/{identificativo}/misurazioni', 'UmiditaController:misu');
    //$app->post('/rilevatori_di_umidita');
    //$app->get('/rilevatori_di_umidita/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', );
    //$app->put('/rilevatori_di_umidita/{identificativo}');
    

    //$app->get('/rilevatori_di_temperatura');
    //$app->get('/rilevatori_di_temperatura/{identificativo}');
    //$app->get('/rilevatori_di_temperatura/{identificativo}/misurazioni ', );
    //$app->get('/rilevatori_di_temperatura/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', );
    //$app->post('/rilevatori_di_temperatura');
    //$app->put('/rilevatori_di_temperatura/{identificativo}');

    

    $app->run();

?>