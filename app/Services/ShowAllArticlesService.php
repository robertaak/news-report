<?php

namespace App\Services;

use App\Models\ArticlesCollection;
use App\Repositories\NewsAPIArticlesRepository;
use App\Repositories\ArticlesRepository;

class ShowAllArticlesService
{
    private ArticlesRepository $articlesRepository;

    public function __construct()
    {
        $this->articlesRepository = new NewsAPIArticlesRepository();
    }

    public function execute(): ArticlesCollection
    {
        return $this->articlesRepository->getTopHeadlines();
    }
}