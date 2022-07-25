<?php

use App\Models\Article;

test('article should work', function() {
    $article = new Article('facebook.com/image', 'facebook', 'social network', 'facebook.com');
    expect($article->getDescription())->toBe('social network');
    expect($article->getUrl())->toBe('facebook.com');
    expect($article->getTitle())->toBe('facebook');
});