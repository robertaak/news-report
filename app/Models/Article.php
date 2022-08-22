<?php

namespace App\Models;

class Article
{
    private ?string $urlToImage;
    private string $title;
    private ?string $url;
    private ?int $id;

    public function __construct(string $urlToImage, string $title, string $url, ?int $id = null)
    {
        $this->urlToImage = $urlToImage;
        $this->title = $title;
        $this->url = $url;
        $this->id = $id;

    }

    public function getUrl(): string
    {
        return !empty($this->url) ? $this->url : '/articles/' . $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUrlToImage(): string
    {
        return !empty($this->urlToImage) ? $this->urlToImage : '/articles/' . $this->id;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

}