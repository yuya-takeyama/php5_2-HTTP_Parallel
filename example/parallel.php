<?php
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '/../src');
require_once 'HTTP/Parallel.php';
require_once dirname(__FILE__) . '/urls.php';

global $URLS;

$http = new HTTP_Parallel;
$reqs = $http->createRequestGroup();

foreach ($URLS as $url) {
    $reqs->add($url);
}

$responses = $reqs->send();

foreach ($responses as $response) {
    echo substr($response->getBody(), 0, 512);
}
