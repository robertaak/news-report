<?php

use App\Repositories\NewsAPIArticlesRepository;
use Dotenv\Dotenv;

require_once "vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$container = new \DI\Container();
$container->set(\App\Repositories\ArticlesRepository::class, DI\create(NewsAPIArticlesRepository::class));


$commands = [
    'articles' => \App\Console\ArticlesCommand::class
];


$selectedCommand = $argv[1];

$container->get($commands[$selectedCommand])->execute($argv[2]);
