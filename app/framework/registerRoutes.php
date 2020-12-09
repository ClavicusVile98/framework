<?php


namespace Framework;


class registerRoutes implements ICommand
{
    /**
     * @var ReceiverRoutes
     */
    private $receiverRoutes;

    /**
     * @var array
     */
    private $data = array();

    /**
     *
     * @param ReceiverRoutes $receiverRoutes
     */
    public function __construct(ReceiverRoutes $receiverRoutes)
    {
        $this->receiverRoutes = $receiverRoutes;
    }

    public function execute(): void
    {
        $this->data['routeCollection'] = $this->receiverRoutes->registerRoutes();
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