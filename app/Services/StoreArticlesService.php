<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ArticlesCollection;
use App\Repositories\MySQLArticlesRepository;

class StoreArticlesService
{
    private MySQLArticlesRepository $mySQLArticlesRepository;

    public function __construct(
        MySQLArticlesRepository $mySQLArticlesRepository
    )

    {
        $this->mySQLArticlesRepository = $mySQLArticlesRepository;

    }

    public function execute(StoreArticlesServiceRequest $request): ArticlesCollection
    {
        $article = new Article(
            $request->getUrlToImage(),
            $request->getTitle(),
            $request->getUrl(),
        );

        $this->mySQLArticlesRepository->save($article);
        return $this->mySQLArticlesRepository->getAllByCategory();
    }
}