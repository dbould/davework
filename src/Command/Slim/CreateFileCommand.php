<?php

namespace Davework\Command\Slim;

use Davework\Service\CreateFileService;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateFileCommand
{
    private $createFileService;

    /**
     * CreateFileCommand constructor.
     * @param CreateFileService $createFileService
     */
    public function __construct($createFileService)
    {
        $this->createFileService = $createFileService;
    }

    protected function configure()
    {
        $this->setName('slim:create-file')
             ->setDescription('Creates a new file, and corresponding factory and test files')
             ->setHelp('slim:create-file [file name] [type]')
             ->setDefinition([
                 new InputOption('file-name', 'f', InputOption::VALUE_REQUIRED),
                 new InputOption('type', 't', InputOption::VALUE_REQUIRED),
             ]);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->createFileService->create(
            $input->getOption('file-name'),
            $input->getOption('type')
        );

        $output->write('File created');
    }
}