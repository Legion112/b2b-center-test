<?php

function url(string $url):string {
    $parts = parse_url($url);
    parse_str($parts['query'], $queryParams);
    $queryParams = array_map('intval', $queryParams);
    $queryParams = array_filter($queryParams, function ($value) {
        return $value !== 3;
    });
    asort($queryParams);
    $queryParams['url'] = $parts['path'];
    return $parts['scheme'] . '://' . $parts['host'] . '?'. http_build_query($queryParams);

}

echo url('https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3');