<?php

namespace Http\Discovery\Strategy;

/**
 * @internal
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
final class CommonClassesStrategy implements DiscoveryStrategy
{
    /**
     * @var array
     */
    private static $classes = [
        'Http\Message\MessageFactory' => [
            ['class' => 'Http\Message\MessageFactory\GuzzleMessageFactory', 'condition' => ['GuzzleHttp\Psr7\Request', 'Http\Message\MessageFactory\GuzzleMessageFactory']],
            ['class' => 'Http\Message\MessageFactory\DiactorosMessageFactory', 'condition' => ['Zend\Diactoros\Request', 'Http\Message\MessageFactory\DiactorosMessageFactory']],
            ['class' => 'Http\Message\MessageFactory\SlimMessageFactory', 'condition' => ['Slim\Http\Request', 'Http\Message\MessageFactory\SlimMessageFactory']],
        ],
        'Http\Message\StreamFactory' => [
            ['class' => 'Http\Message\StreamFactory\GuzzleStreamFactory', 'condition' => ['GuzzleHttp\Psr7\Request', 'Http\Message\StreamFactory\GuzzleStreamFactory']],
            ['class' => 'Http\Message\StreamFactory\DiactorosStreamFactory', 'condition' => ['Zend\Diactoros\Request', 'Http\Message\StreamFactory\DiactorosStreamFactory']],
            ['class' => 'Http\Message\StreamFactory\SlimStreamFactory', 'condition' => ['Slim\Http\Request', 'Http\Message\StreamFactory\SlimStreamFactory']],
        ],
        'Http\Message\UriFactory' => [
            ['class' => 'Http\Message\UriFactory\GuzzleUriFactory', 'condition' => ['GuzzleHttp\Psr7\Request', 'Http\Message\UriFactory\GuzzleUriFactory']],
            ['class' => 'Http\Message\UriFactory\DiactorosUriFactory', 'condition' => ['Zend\Diactoros\Request', 'Http\Message\UriFactory\DiactorosUriFactory']],
            ['class' => 'Http\Message\UriFactory\SlimUriFactory', 'condition' => ['Slim\Http\Request', 'Http\Message\UriFactory\SlimUriFactory']],
        ],
        'Http\Client\HttpAsyncClient' => [
            ['class' => 'Http\Adapter\Guzzle6\Client', 'condition' => 'Http\Adapter\Guzzle6\Client'],
            ['class' => 'Http\Client\Curl\Client', 'condition' => 'Http\Client\Curl\Client'],
            ['class' => 'Http\Adapter\React\Client', 'condition' => 'Http\Adapter\React\Client'],
        ],
        'Http\Client\HttpClient' => [
            ['class' => 'Http\Adapter\Guzzle6\Client', 'condition' => 'Http\Adapter\Guzzle6\Client'],
            ['class' => 'Http\Adapter\Guzzle5\Client', 'condition' => 'Http\Adapter\Guzzle5\Client'],
            ['class' => 'Http\Client\Curl\Client', 'condition' => 'Http\Client\Curl\Client'],
            ['class' => 'Http\Client\Socket\Client', 'condition' => 'Http\Client\Socket\Client'],
            ['class' => 'Http\Adapter\Buzz\Client', 'condition' => 'Http\Adapter\Buzz\Client'],
            ['class' => 'Http\Adapter\React\Client', 'condition' => 'Http\Adapter\React\Client'],
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public static function getCandidates($type)
    {
        if (isset(self::$classes[$type])) {
            return self::$classes[$type];
        }

        return [];
    }
}
