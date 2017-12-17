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

        foreach ($this->process as $type => $data) {
            if ($this->process::OUT === $type) {
                echo "\nRead from stdout: ".$data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr: ".$data;
            }
        }

        $process = new Process('ls -la' . __DIR__ . '/../../tests/TestFiles/Project/slim-skeleton');
        $process->run();
        foreach ($process as $type => $data) {
            if ($process::OUT === $type) {
                echo "\nRead from stdout: ".$data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr: ".$data;
            }
        }

        die();
    }
}
