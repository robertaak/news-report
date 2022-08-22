<?php

namespace App\Services;

class StoreArticlesServiceRequest
{
    private string $title;

    private string $url;
    private string $urlToImage;

    public function __construct(string $title,  string $url, string $urlToImage)
    {
        $this->title = $title;
        $this->url = $url;
        $this->urlToImage = $urlToImage;
    }

    /**
     * @return string
     */
    public function getUrlToImage(): string
    {
        return $this->urlToImage;
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

}