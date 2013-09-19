<?php

namespace TuxOne\SocialMetatagsBundle\Twig\Extension;

use TuxOne\SocialMetatagsBundle\Templating\Helper\SocialMetatagsHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SocialMetatagsExtension extends \Twig_Extension
{
    protected $container;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Returns a list of global functions to add to the existing list.
     *
     * @return array An array of global functions
     */
    public function getFunctions()
    {
        return array(
            'socialmetatags_initialize' => new \Twig_Function_Method($this, 'renderInitialize', array('twitter_image' => 'http://example.com')),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'socialmetatags';
    }

    /**
     * @see SocialMetatagsHelper::initialize()
     */
    public function renderInitialize($parameters = array(), $name = null)
    {
        return $this->container->get('tuxone_socialmetatags.helper')->initialize($parameters, $name ?: 'TuxOneSocialMetatagsBundle::initialize.html.twig');
    }
}
