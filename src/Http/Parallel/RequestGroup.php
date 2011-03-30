<?php
require_once dirname(__FILE__) . '/Response.php';
require_once dirname(__FILE__) . '/ResponseGroup.php';

/**
 * Http_Parallel_RequestGroup
 *
 * HTTP リクエストをグループ化し, 並列してリクエストを行う.
 */
class Http_Parallel_RequestGroup
{
    /**
     * curl_multi_* リソース.
     *
     * @var resource
     */
    protected $_curlMulti;

    /**
     * curl リソースを格納する配列.
     *
     * @var array<resource>
     */
    protected $_curls;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * リクエストグループの初期化.
     *
     * @return void
     */
    public function init()
    {
        $this->_curlMulti = curl_multi_init();
        $this->_curls     = array();
    }

    /**
     * リクエスト先の URL を追加する.
     *
     * @param  string $url
     * @return void
     */
    public function add($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_multi_add_handle($this->_curlMulti, $curl);
        $this->_curls[] = $curl;
    }

    /**
     * リクエストの送信.
     *
     * @return void
     */
    public function send()
    {
        do {
            curl_multi_exec($this->_curlMulti, $running);
        } while ($running);

        $responses = new Http_Parallel_ResponseGroup;
        foreach ($this->_curls as $curl) {
            $responses[] = Http_Parallel_Response::create($curl);
        }
        return $responses;
    }
}
