<?php

namespace spec\Http\Discovery\Strategy;

use Http\Client\HttpClient;
use Http\Discovery\ClassDiscovery;
use Http\Discovery\Strategy\DiscoveryStrategy;
use Http\Discovery\Strategy;
use PhpSpec\ObjectBehavior;
use spec\Http\Discovery\Helper\DiscoveryHelper;

class MockClientStrategySpec extends ObjectBehavior
{
    function let()
    {
        ClassDiscovery::setStrategies(['Http\Discovery\Strategy\MockClientStrategy']);
    }

    function it_should_return_the_mock_client(DiscoveryStrategy $strategy)
    {
        $candidates = $this->getCandidates('Http\Client\HttpClient');
        $candidates->shouldBeArray();
        $candidates->shouldHaveCount(1);
    }
}
