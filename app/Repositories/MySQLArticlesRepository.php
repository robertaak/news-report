<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\ArticlesCollection;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

class MySQLArticlesRepository implements ArticlesRepository
{
    private Connection $connection;

    public function __construct()
    {
        $connectionParams = [
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['USER'],
            'password' => $_ENV['PASSWORD'],
            'host' => $_ENV['HOST'],
            'driver' => $_ENV['DRIVER']
        ];
        $this->connection = DriverManager::getConnection($connectionParams);
    }

    public function getAllByCategory(string $category = ''): ArticlesCollection
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $entries = $queryBuilder
            ->select('*')
            ->from('articles')
            ->executeQuery()
            ->fetchAllAssociative();
        $articles = [];
        foreach ($entries as $article) {
            $articles[] = new Article(
                (string)$article['image_url'],
                (string)$article['title'],
                (string)$article['url'],
                (int)$article['id'],
            );
        }
        return new ArticlesCollection($articles);
    }

    public function save(Article $article): void
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder->insert('articles')
            ->values([
                'title' => ':title',
                'image_url' => ':image_url',
                'url' => ':url'
            ])
            ->setParameters([
                'title' => $article->getTitle(),
                'image_url' => $article->getUrlToImage(),
                'url' => $article->getUrl()
            ])
        ->executeQuery();
    }
}