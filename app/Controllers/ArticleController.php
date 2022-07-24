<?php

namespace App\Controllers;

use App\Services\ShowAllArticlesService;
use App\View;

class ArticleController
{
    public function show(): View
    {
        $service = new ShowAllArticlesService();

        return new View('articles-index.twig', ['articles' => $service->execute()->getAll()]);
    }
}