<?php

declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use App\Strategy\Message;
use App\Strategy\StrategyInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MessageCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $resolverService = $container->findDefinition(Message::class);

        $strategyServices = array_keys($container->findTaggedServiceIds(StrategyInterface::SERVICE_TAG));

        foreach ($strategyServices as $strategyService) {
            $resolverService->addMethodCall('addStrategy', [new Reference($strategyService)]);
        }
    }
}