<?php

declare(strict_types=1);

namespace App\Strategy;

class Message
{
    private $strategies;

    public function addStrategy(StrategyInterface $strategy): void
    {
        $this->strategies[] = $strategy;
    }

    public function send(string $type, iterable $payload = []): void
    {
        /** @var StrategyInterface $strategy */
        foreach ($this->strategies as $strategy) {
            if ($strategy->isSendable($type, $payload)) {
                $strategy->send($payload);

                return;
            }
        }
    }
}