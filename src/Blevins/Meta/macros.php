<?php

HTML::macro('comment', function($value) {

    return '<!-- '.$value.' -->';
});

HTML::macro('meta', function($attributes) {

    return '<meta '.HTML::attributes($attributes).' />';
});

HTML::macro('title', function($title) {

    return '<title>'.$title.'</title>';
});