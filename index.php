<?php

use Dotenv\Dotenv;

require_once "vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'App\Controllers\ArticleController@show');

    $r->addRoute('GET', '/articles', 'App\Controllers\ArticleController@show');

    $r->addRoute('GET', '/articles/create', 'App\Controllers\ArticleController@createArticle');
    $r->addRoute('POST', '/articles', 'App\Controllers\ArticleController@store');

    $r->addRoute('GET', '/articles/created', 'App\Controllers\ArticleController@showAdded');

});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        [$controller, $method] = explode('@', $handler);

        $loader = new \Twig\Loader\FilesystemLoader('app/Views');
        $twig = new \Twig\Environment($loader);

        $container = new \DI\Container();
        $container->set(\App\Repositories\ArticlesRepository::class, DI\create(\App\Repositories\NewsAPIArticlesRepository::class));

        /** @var \App\View $view */
        $view = ($container->get($controller))->$method();

        if ($view) {
            $template = $twig->load($view->getTemplatePath() . '.twig');
            echo $template->render($view->getData());
        }

        break;
}

