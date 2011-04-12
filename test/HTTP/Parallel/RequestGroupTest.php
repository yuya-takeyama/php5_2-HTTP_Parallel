<?php
require_once dirname(__FILE__) . '/../../test_helper.php';
require_once 'HTTP/Parallel/RequestGroup.php';

/**
 * Test class for HTTP_Parallel_RequestGroup.
 */
class HTTP_Parallel_RequestGroupTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var HTTP_Parallel_RequestGroup
     */
    protected $reqs;

    const SANDBOX_SERVER = 'http://localhost:8124';

    protected function setUp()
    {
        $this->reqs = new HTTP_Parallel_RequestGroup;
    }

    public function testSend()
    {
        $this->reqs->add(self::SANDBOX_SERVER . '/echo?foo');
        $this->reqs->add(self::SANDBOX_SERVER . '/echo?bar');
        $this->reqs->add(self::SANDBOX_SERVER . '/echo?baz');

        $responses = $this->reqs->send();

        $this->assertEquals('foo', $responses[0]->getBody());
        $this->assertEquals('bar', $responses[1]->getBody());
        $this->assertEquals('baz', $responses[2]->getBody());
    }
}
