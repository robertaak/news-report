<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\ArticlesCollection;
use Dotenv\Dotenv;
use GuzzleHttp\Client;

class NewsAPIArticlesRepository implements ArticlesRepository
{

    public function getTopHeadlines(): ArticlesCollection
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $api = $_ENV['API_KEY'];

        $url = 'https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=';

        $client = new Client();

        $response = $client->get($url . $api);

        $response = (json_decode($response->getBody()));

        $articles = [];

        foreach ($response->articles as $article)
        {
            $articles[] = new Article(
                $article->urlToImage,
                $article->title,
                $article->description,
                $article->url
            );
        }
        return new ArticlesCollection($articles);
    }
}