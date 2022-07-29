<?php

namespace App\Models;

class Article
{
    private ?string $urlToImage;
    private ?string $title;

    private ?string $url;
    private ?string $description;

    public function __construct(string $urlToImage, string $title, string $url, ?string $description)
    {
        $this->urlToImage = $urlToImage;
        $this->title = $title;
        $this->url = $url;
        $this->description = $description;

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