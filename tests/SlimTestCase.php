<?php
namespace Tests;

use PHPUnit_Framework_TestCase;
use Psr\Container\ContainerInterface;
use Slim\App;

class SlimTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @before
     */
    public function setupContainer()
    {
        if (!isset($this->container)) {
            $app = new App(require __DIR__ . '/../src/settings.php');

            require __DIR__ . '/../bootstrap.php';

            // Register Config
            if (file_exists(__DIR__ . '/davework.json')) {
                $configJson = file_get_contents(__DIR__ . '/davework.json');
            } else {
                die("Couldn't find davework.json\n");
            }

            $projectRoot = pathinfo(realpath(__DIR__ . '/davework.json'), PATHINFO_DIRNAME);
            $config = json_decode($configJson);
            $config->rootDirectory = $projectRoot . '/' . $config->rootDirectory;
            $config->testsDirectory = $projectRoot . '/' . $config->testsDirectory;

            if (!isset($config->factoriesLiveWithClasses)) {
                $config->factoriesLiveWithClasses = false;
            }

            $this->container = $app->getContainer();
            $this->container['config'] = $config;
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
