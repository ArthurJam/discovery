<?php

namespace Http\Discovery\Strategy;

/**
 * Find the Mock client.
 *
 * @author Sam Rapaport <me@samrapdev.com>
 */
final class MockClientStrategy implements DiscoveryStrategy
{
    /**
     * {@inheritdoc}
     */
    public static function getCandidates($type)
    {
        return ($type === 'Http\Client\HttpClient')
            ? [['class' => 'Http\Mock\Client', 'condition' => 'Http\Mock\Client']]
            : [];
    }
}
