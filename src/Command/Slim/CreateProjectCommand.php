<?php

namespace Davework\Command\Slim;

use Davework\Service\CreateSlimProjectService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateProjectCommand extends Command
{
    private $createSlimProjectService;

    /**
     * CreateProjectCommand constructor.
     * @param CreateSlimProjectService $createSlimProjectService
     */
    public function __construct(CreateSlimProjectService $createSlimProjectService)
    {
        parent::__construct();

        $this->createSlimProjectService = $createSlimProjectService;
    }

    protected function configure()
    {
        $this->setName('slim:create-project')
             ->setDescription('Creates a new slim project from the skeleton app')
             ->setHelp('slim:create-project [project name]')
             ->setDefinition(
                 new InputDefinition([
                     new InputOption('project-name', 'p', InputOption::VALUE_REQUIRED),
                 ]));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$this->createSlimProjectService->createProject();
        $output->write('HELLO WORLD');
    }
}
