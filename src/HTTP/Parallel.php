<?php
require_once dirname(__FILE__) . '/Parallel/RequestGroup.php';

/**
 * HTTP_Parallel
 *
 * HTTP リクエストを並行して行う..
 * curl_multi_* 系関数のラッパー.
 */
class HTTP_Parallel
{
    /**
     * リクエストグループを生成する.
     *
     * @return HTTP_Parallel_RequestGroup
     */
    public function createRequestGroup()
    {
        return new HTTP_Parallel_RequestGroup;
    }
}
