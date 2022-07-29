<?php

namespace App\Controllers;

use App\Services\ShowAllArticlesService;
use App\Services\StoreArticlesService;
use App\Services\StoreArticlesServiceRequest;
use App\View;

class ArticleController
{
    private ShowAllArticlesService $service;
    private StoreArticlesService $storeArticlesService;

    public function __construct(
        ShowAllArticlesService $service,
        StoreArticlesService $storeArticlesService)
    {
        $this->service = $service;
        $this->storeArticlesService = $storeArticlesService;
    }

    public function show(): View
    {
        $category = $_GET['category'] ?? 'general';
        return new View('articles-index.twig', [
            'articles' => $this->service->execute($category)->getAll()
        ]);
    }

    public function create(): View
    {
        return new View('articles-add.twig', []);
    }


    public function store(): void
    {
        $this->storeArticlesService->execute(
            new StoreArticlesServiceRequest(
                $_POST['title'],
                $_POST['description'],
                $_POST['url'],
                $_POST['urlToImage']
            )
        );
        header('Location: /articles');
    }
}