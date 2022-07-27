<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\ArticlesCollection;
use GuzzleHttp\Client;

class NewsAPIArticlesRepository implements ArticlesRepository
{
    private const API_URL = 'https://newsapi.org/v2/';

    private Client $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => self::API_URL
        ]);
    }

    public function getTopHeadlines(): ArticlesCollection
    {
        $url = 'top-headlines?sources=techcrunch&apiKey=' . $_ENV['NEWSAPI_API_KEY'];

        $response = $this->httpClient->get($url);

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