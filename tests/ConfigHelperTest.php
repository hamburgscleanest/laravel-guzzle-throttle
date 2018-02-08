<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Tests;

use hamburgscleanest\LaravelGuzzleThrottle\Helpers\ConfigHelper;

/**
 * Class ConfigHelperTest
 * @package hamburgscleanest\LaravelGuzzleThrottle\Tests
 */
class ConfigHelperTest extends TestCase
{

    /**
     * @test
     * @throws \Exception
     */
    public function gets_request_limit_ruleset()
    {
        $this->_setConfig();

        $requestLimitGroup = ConfigHelper::getRequestLimitRuleset()->getRequestLimitGroup();

        $this->assertEquals(1, $requestLimitGroup->getRequestLimiterCount());
        $this->assertEquals(0, $requestLimitGroup->getRetryAfter());
    }

}