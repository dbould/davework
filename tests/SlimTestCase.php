<?php
namespace Tests;

use PHPUnit_Framework_TestCase;
use Slim\App;

class SlimTestCase extends PHPUnit_Framework_TestCase
{
    private $container;

    /**
     * @before
     */
    public function setupContainer()
    {
        if (!isset($this->container)) {
            $app = new App(require __DIR__ . '/../src/settings.php');

            require __DIR__ . '/../src/dependencies.php';

            $this->container = $app->getContainer();
        }
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }
}