<?php


namespace Framework;

use Symfony\Component\HttpFoundation\Request;

class mainProcess implements ICommand
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Process
     */
    private $process;

    /**
     * @var array
     */
    private $data = array();

    /**
     * Process constructor.
     * @param Request $request
     * @param Process $process
     */
    public function __construct(Request $request, Process $process)
    {
        $this->request = $request;
        $this->process = $process;
    }

    public function execute(): void
    {
        $this->data["Response"] = $this->process->process($this->request);
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        $trace = debug_backtrace();
        trigger_error(
            'Неопределенное свойство в __get(): ' . $name .
            ' в файле ' . $trace[0]['file'] .
            ' на строке ' . $trace[0]['line'],
            E_USER_NOTICE
        );
        return null;
    }
}