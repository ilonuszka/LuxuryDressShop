<?php

declare(strict_types=1);

namespace App\Framework;

class Router {
    private array $routeList = [];
    
    public function __construct(private \App\Framework\DIContainer $DIContainer){}

    public function registerRoute(string $method, string $route, string $controller, string $controllerMethod):self {
        //viska ka priemam per funkcija surasome i array(padarome array)
        $this->routeList[$method][$route] = ['controller' => $controller, 'method' => $controllerMethod];
        return $this;
        //grazina metoda router.
    }//routeris priskiria kuris kontorleris veiks , apdoros uzklausa.

    public function process(string $uri, string $method): void {
        $path = rtrim(explode('?',$uri)[0], "/"); //istrynam naujas/namas?vadas=ilona, istrynajm viskas kas uz klaustuo, pasiliekam
        //priekine dali , kai istriname dali ,kurios mums nereikia tada if pagalba tikriname ar array yra uzregintas toks
        //kelias su atitinkamu get arba post metodu, tikriname ar masyve uzra uzregintas kelias ir post/ paduodame url
        // ir metoda
        if (isset($this->routeList[$method][$path])) {
            try {
                //jei randame is masyvo pasiimame klases pavadinima ir sukuriame ja per di konteineri,
                $controller = $this->DIContainer->get($this->routeList[$method][$path]['controller']);
                //iskvieciam sukurtam kontrolerio objektui masyve nurodyta metoda.
                call_user_func([$controller, $this->routeList[$method][$path]['method']]);
            }
            catch (\App\Exceptions\OrderException $e){
                $controller = $this->DIContainer->get(\App\Controllers\ExceptionController::class);
                $controller->displayOrderError($e->getMessage());
            }
        }
        //jei kelio tokio nera tai metame error
        else { require __DIR__.'/../../views/errors/404.php'; };
    }
}