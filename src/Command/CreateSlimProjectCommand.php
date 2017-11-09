<?php

namespace Davework\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateSlimProjectCommand extends Command
{
    protected function configure()
    {
        $this->setName('create-slim-project')
             ->setDescription('Creates a new slim project from the skeleton app')
             ->setHelp('create-slim-project [project name]');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('HELLO WORLD');
    }
}