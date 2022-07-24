<?php

use App\Models\Article;

test('article should work', function() {
    $article = new Article('https://codelex.io', 'codelex', 'works or not', 'https://codelex.io');
    expect($article->getDescription())->toBe('works or not');
    expect($article->getUrl())->toBe('https://codelex.io');
    expect($article->getTitle())->toBe('codelex');
});