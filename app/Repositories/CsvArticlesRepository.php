<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\ArticlesCollection;

class CsvArticlesRepository implements ArticlesRepository
{
    public function getAllByCategory(string $category = 'general'): ArticlesCollection
    {
        return new ArticlesCollection([]);
    }

    public function save(Article $article): void
    {
        var_dump('save me'); die;
    }
}