<?php
namespace Projek\Slim;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use InvalidArgumentException;

class MonologProvider implements ServiceProviderInterface
{
    /**
     * Register this monolog provider with a Pimple container
     *
     * @param Container $container
     */
    public function register(Container $container)
    {
        if (!$container['settings']->has('monolog')) {
            throw new InvalidArgumentException('Logger configuration not found');
        }

        $container['view'] = new Monolog('slim-app', $container['settings']->get('monolog'));
    }
}