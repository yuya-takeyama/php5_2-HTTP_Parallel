<?php
/**
 * Http_Parallel_Response
 *
 * HTTP レスポンス.
 */
class Http_Parallel_Response
{
    /**
     * Constructor.
     */
    public function __construct($params)
    {
        $this->_status = $params['status'];
        $this->_body   = $params['body'];
    }

    /**
     * curl リソースからオブジェクトを生成する.
     *
     * @param  resource
     * @return Http_Parallel_Response
     */
    public static function create($curl)
    {
        $info = curl_getinfo($curl);
        return new self(array(
            'status' => $info['http_code'],
            'body'   => curl_multi_getcontent($curl),
        ));
    }

    /**
     * HTTP ステータスコードの取得.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * レスポンスボディの取得.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->_body;
    }
}
