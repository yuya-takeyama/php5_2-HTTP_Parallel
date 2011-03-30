HTTP_Parallel
=============

これは何 ?
----------

PHP で HTTP のリクエストを並行して行うためのライブラリです.
curl\_* 及び curl_multi\_* 系関数のラッパーとして実装されています.

使用例
------

    require_once 'HTTP/Parallel.php';

    $urls = array(
        'http://example.com/',
        'http://example.net/',
        'http://example.org/',
    );

    $http = new HTTP_Parallel;
    $reqs = $http->createRequestGroup();

    foreach ($urls as $url) {
        $reqs->add($url);
    }

    $responses = $reqs->send();

    foreach ($responses as $response) {
        echo $response->getBody(), PHP_EOL;
    }

作者
----

Yuya Takeyama (@yuya_takeyama)

http://yuyat.jp/
