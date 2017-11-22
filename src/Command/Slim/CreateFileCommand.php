<?php

namespace Davework\Command\Slim;

use Davework\Service\CreateFileService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateFileCommand extends Command
{
    private $createFileService;

    /**
     * CreateFileCommand constructor.
     * @param CreateFileService $createFileService
     */
    public function __construct($createFileService)
    {
        parent::__construct();

        $this->createFileService = $createFileService;
    }

    protected function configure()
    {
        $this->setName('slim:create-file')
             ->setDescription('Creates a new file, and corresponding factory and test files')
             ->setHelp('slim:create-file [file name] [type]')
             ->addArgument('file-name', InputArgument::REQUIRED, 'File name')
             ->addArgument(
                 'type',
                 InputArgument::REQUIRED,
                 'File type to create: controller | service');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->createFileService->create(
            $input->getArgument('file-name'),
            $input->getArgument('type')
        );

        $output->write('File created');
    }
}
