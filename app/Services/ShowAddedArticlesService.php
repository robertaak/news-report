<?php

namespace App\Services;

use App\Models\ArticlesCollection;
use App\Repositories\MySQLArticlesRepository;

class ShowAddedArticlesService
{
    private MySQLArticlesRepository $mySQLArticlesRepository;

    public function __construct(MySQLArticlesRepository $mySQLArticlesRepository)
    {
        $this->mySQLArticlesRepository = $mySQLArticlesRepository;
    }

    public function execute(string $category): ArticlesCollection
    {
        return $this->mySQLArticlesRepository->getAllByCategory($category);
    }
}