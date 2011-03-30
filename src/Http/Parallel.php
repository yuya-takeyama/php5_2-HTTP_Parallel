<?php
require_once dirname(__FILE__) . '/Parallel/RequestGroup.php';

/**
 * Http_Parallel
 *
 * HTTP リクエストを並行して行う..
 * curl_multi_* 系関数のラッパー.
 */
class Http_Parallel
{
    /**
     * リクエストグループを生成する.
     *
     * @return Http_Parallel_RequestGroup
     */
    public function createRequestGroup()
    {
        return new Http_Parallel_RequestGroup;
    }
}
