<?php

namespace App\Models;

class Article
{
    private string $urlToImage;
    private string $title;
    private ?string $description;
    private string $url;

    public function __construct(string $urlToImage, string $title, string $description, string $url)
    {
        $this->urlToImage = $urlToImage;
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUrlToImage(): string
    {
        return $this->urlToImage;
    }

}