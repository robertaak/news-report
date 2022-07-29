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

    public function getAllByCategory($category): ArticlesCollection
    {
        $url = "top-headlines?country=us&category=$category&apiKey={$_ENV['NEWSAPI_API_KEY']}";

        $response = $this->httpClient->get($url);

        $response = (json_decode($response->getBody()));

        $articles = [];

        foreach ($response->articles as $article) {
            $articles[] = new Article(
                (string)$article->urlToImage,
                (string)$article->title,
                (string)$article->url,
                (string)$article->description
            );
        }

        return new ArticlesCollection($articles);
    }

    public function save(Article $article): void
    {
        // TODO: Implement save() method.
    }
}