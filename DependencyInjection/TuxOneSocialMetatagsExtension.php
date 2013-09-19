<?php

namespace TuxOne\SocialMetatagsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

class TuxOneSocialMetatagsExtension extends Extension
{
    protected $resources = array(
        'socialmetatags' => 'socialmetatags.xml',
    );

    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        $this->loadDefaults($container);

        foreach (array('helper', 'twig') as $attribute) {
            $container->setParameter('tuxone_socialmetatags.'.$attribute.'.class', $config['class'][$attribute]);
        }

        foreach (array('site', 'app_id_googleplay', 'app_id_iphone', 'app_id_ipad') as $attribute) {
            $container->setParameter('tuxone_socialmetatags.twitter.'.$attribute, $config['twitter'][$attribute]);
        }

        foreach (array('image') as $attribute) {
            $container->setParameter('tuxone_socialmetatags.'.$attribute, $config[$attribute]);
        }
    }

    /**
     * @codeCoverageIgnore
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__ . '/../Resources/config/schema';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getNamespace()
    {
        return 'http://symfony.com/schema/dic/tuxone_socialmetatags';
    }

    /**
     * @codeCoverageIgnore
     */
    protected function loadDefaults($container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        foreach ($this->resources as $resource) {
            $loader->load($resource);
        }
    }
}
