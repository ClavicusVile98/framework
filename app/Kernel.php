<?php

declare(strict_types = 1);

use Framework\mainProcess;
use Framework\Process;
use Framework\ReceiverConfigs;
use Framework\ReceiverRoutes;
use Framework\RegisterConfigs;
use Framework\RegisterRoutes;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;

class Kernel
{
    /**
     * @var RouteCollection
     */
    protected $routeCollection;

    /**
     * @var ContainerBuilder
     */
    protected $containerBuilder;

    public function __construct(ContainerBuilder $containerBuilder)
    {
        $this->containerBuilder = $containerBuilder;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $configs = new registerConfigs(new ReceiverConfigs($this->containerBuilder));
        $configs->execute();
        $this->containerBuilder = $configs->containerBuilder;
        $routes = new registerRoutes(new ReceiverRoutes($this->containerBuilder));
        $routes->execute();
        $this->routeCollection = $routes->routeCollection;
        $process = new mainProcess($request, new Process($this->routeCollection));
        $process->execute();
        return $process->Response;
    }
}
