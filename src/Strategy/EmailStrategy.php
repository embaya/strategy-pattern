<?php

declare(strict_types=1);

namespace App\Strategy;

class EmailStrategy implements StrategyInterface
{
    private $key = 'email';

    public function isSendable(string $type, iterable $payload = []): bool
    {
        return $type === $this->key && isset($payload[self::MESSAGE_KEY]);
    }

    public function send(iterable $payload = []): void
    {
        file_put_contents($this->key.'.log', $payload[self::MESSAGE_KEY].PHP_EOL, FILE_APPEND);
    }
}