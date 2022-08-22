<?php

namespace App\Controllers;

use App\Services\ShowAddedArticlesService;
use App\Services\ShowAllArticlesService;
use App\Services\StoreArticlesService;
use App\Services\StoreArticlesServiceRequest;
use App\View;

class ArticleController
{
    private ShowAllArticlesService $service;
    private ShowAddedArticlesService $addedArticlesService;
    private StoreArticlesService $storeArticlesService;

    public function __construct(
        ShowAllArticlesService $service,
        ShowAddedArticlesService $addedArticlesService,
        StoreArticlesService $storeArticlesService
    )

    {
        $this->service = $service;
        $this->showAddedArticlesService = $addedArticlesService;
        $this->storeArticlesService = $storeArticlesService;
    }

    public function show(): View
    {
        $category = $_GET['category'] ?? 'general';
        return new View('articles-index', [
            'articles' => $this->service->execute($category)->getAll()
        ]);
    }

    public function showAdded(): View
    {
        return new View('articles-created', [
            'articles' => $this->showAddedArticlesService->execute('')->getAll()
        ]);
    }

    public function createArticle(): View
    {
        return new View('articles-add', []);
    }



    public function store()
    {
        $this->storeArticlesService->execute(
            new StoreArticlesServiceRequest(
                (string)$_POST['urlToImage'],
                (string)$_POST['title'],
                (string)$_POST['url'],
            )
        );
        header('Location: /articles');

    }

}