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
        var_dump($this->process->getOutput());
        var_export($this->process->getOutput());

        foreach ($this->process as $type => $data) {
            if ($this->process::OUT === $type) {
                echo "\nRead from stdout: ".$data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr: ".$data;
            }
        }
        die();
    }
}
