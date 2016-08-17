<?php

namespace T4web\Log;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\Console\Adapter\AdapterInterface;

class Module implements ConfigProviderInterface, ConsoleUsageProviderInterface
{
    public function getConfig()
    {
        return include dirname(__DIR__) . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'T4web\Log' => dirname(__DIR__),
                ),
            ),
        );
    }

    public function getConsoleUsage(AdapterInterface $console)
    {
        return [
            'Initialize log',
            'log init' => 'Check config, create table `log`',
        ];
    }
}
