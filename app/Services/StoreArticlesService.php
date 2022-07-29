<?php

namespace App\Services;

use App\Models\Article;
use App\Repositories\CsvArticlesRepository;

class StoreArticlesService
{
    private CsvArticlesRepository $csvArticlesRepository;
    public function __construct(CsvArticlesRepository $csvArticlesRepository)
    {
        return $this->csvArticlesRepository = $csvArticlesRepository;
    }

    public function execute(StoreArticlesServiceRequest $request): void
    {
        $article = new Article(
            $request->getTitle(),
            $request->getDescription(),
            $request->getUrl(),
            $request->getUrlToImage()
        );

        $this->csvArticlesRepository->save($article);
    }
}