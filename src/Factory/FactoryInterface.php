<?php
namespace Dbould\Davework\Factory;

use Psr\Container\ContainerInterface;

interface FactoryInterface
{
    public function __invoke(ContainerInterface $container);
}