<?php
namespace Davework\Command\Slim;

use Davework\Service\CreateSlimProjectService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class CreateProjectCommand extends Command
{
    /**
     * CreateProjectCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('slim:create-project')
             ->setDescription('Creates a new slim project from the skeleton app')
             ->setHelp('slim:create-project [project name]')
             ->addArgument('name', InputArgument::OPTIONAL, 'Project Name')
             ->addArgument(
                'location',
                InputArgument::OPTIONAL,
                'Which folder to create the project in');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getArgument('name') !== null) {
            $projectName = '/' . $input->getArgument('name');
        } else {
            $projectName = '/slim-skeleton';
        }

        if ($input->getArgument('location') !== null) {
            $location = $input->getArgument('location');
        } else {
            $location = './';
        }

        $process = new Process('git clone https://github.com/slimphp/Slim-Skeleton.git ' . $location . $projectName);
        $process->run();

        $this->createProjectDirectories($location . $projectName);
        $this->moveConfig($location . $projectName);

        $output->write('Project successfully created');
    }

    private function moveConfig($location)
    {
        $this->moveJson($location);
        $this->movePhar($location);
    }

    private function moveJson($location)
    {
        if (file_exists('davework.json')) {
            $process = new Process('mv davework.json ' . $location);
            $process->run();
        }
    }

    private function movePhar($location)
    {
        if (file_exists('davework.phar')) {
            $process = new Process('mv davework.phar ' . $location);
            $process->run();
        }
    }

    private function createProjectDirectories($location)
    {
        $directories = [
            $location . '/src/Controller',
            $location . '/src/Factory',
            $location . '/src/Service',
            $location . '/tests/Functional/Controller',
            $location . '/tests/Functional/Factory',
            $location . '/tests/Functional/Service',
        ];

        foreach ($directories as $directory) {
            $this->createProjectDirectory($directory);
        }
    }

    private function createProjectDirectory($directory)
    {
        $process = new Process('mkdir ' . $directory);
        $process->run();
    }
}
