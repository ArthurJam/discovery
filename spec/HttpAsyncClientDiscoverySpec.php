<?php

namespace spec\Http\Discovery;

use Http\Client\HttpAsyncClient;
use Http\Discovery\ClassDiscovery;
use Http\Discovery\NotFoundException;
use Http\Discovery\Strategy\DiscoveryStrategy;
use Prophecy\Argument;
use Puli\GeneratedPuliFactory;
use Puli\Discovery\Api\Discovery;
use Puli\Discovery\Binding\ClassBinding;
use Puli\Repository\Api\ResourceRepository;
use PhpSpec\ObjectBehavior;
use spec\Http\Discovery\Helper\DiscoveryHelper;

class HttpAsyncClientDiscoverySpec extends ObjectBehavior
{
    function let()
    {
        ClassDiscovery::setStrategies(['spec\Http\Discovery\Helper\DiscoveryHelper']);
        DiscoveryHelper::clearClasses();
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Discovery\HttpAsyncClientDiscovery');
    }

    function it_is_a_class_discovery()
    {
        $this->shouldHaveType('Http\Discovery\ClassDiscovery');
    }

    function it_finds_an_async_http_client(DiscoveryStrategy $strategy) {

        $candidate = ['class' => 'spec\Http\Discovery\Stub\HttpAsyncClientStub', 'condition' => true];
        DiscoveryHelper::setClasses('Http\Client\HttpAsyncClient', [$candidate]);

        $this->find()->shouldImplement('Http\Client\HttpAsyncClient');
    }

    function it_throw_exception(DiscoveryStrategy $strategy) {
        $this->shouldThrow('Http\Discovery\NotFoundException')->duringFind();
    }
}
