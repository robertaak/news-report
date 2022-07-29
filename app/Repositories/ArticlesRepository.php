<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\ArticlesCollection;

interface ArticlesRepository
{
    public function getAllByCategory(string $category): ArticlesCollection;
    public function save (Article $article): void;
}