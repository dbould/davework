<?php
namespace Davework\Service;

use Symfony\Component\Process\Process;

class CreateSlimProjectService
{
    private $process;

    /**
     * CreateSlimProjectService constructor.
     * @param Process $process
     */
    public function __construct(Process $process)
    {
        $this->process = $process;
    }

    public function createProject()
    {
        $this->process->run();
    }
}
