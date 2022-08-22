<?php

use App\Models\Article;

test('article should work', function() {
    $article = new Article('facebook.com/image', 'facebook', 'social network');
    expect($article->getUrl())->toBe('facebook.com');
    expect($article->getTitle())->toBe('facebook');
});