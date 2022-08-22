<?php

namespace App\Console;

use App\Models\Article;
use App\Services\ShowAllAddedArticlesService;

class ArticlesCommand
{
    private ShowAllAddedArticlesService $service;

    public function __construct(ShowAllAddedArticlesService $service)
    {
        $this->service = $service;
    }

    public function execute(string $category)
    {
        /** @var Article[] $articles */
        $articles = $this->service->execute($category)->getAll();

        foreach ($articles as $i => $article) {
            echo $article->getTitle() . PHP_EOL;

            if ($i == 10) break;
        }
    }
}