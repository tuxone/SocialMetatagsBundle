<?php

namespace TuxOne\SocialMetatagsBundle\Tests\DependencyInjection;

use TuxOne\SocialMetatagsBundle\DependencyInjection\TuxOneSocialMetatagsExtension;

class TuxOneSocialMetatagsExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers TuxOne\SocialMetatagsBundle\DependencyInjection\TuxOneSocialMetatagsExtension::load
     */
    public function testLoadFailure()
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $extension = $this->getMockBuilder('TuxOne\\SocialMetatagsBundle\\DependencyInjection\\TuxOneSocialMetatagsExtension')
            ->getMock();

        $extension->load(array(array()), $container);
    }

    /**
     * @covers TuxOne\SocialMetatagsBundle\DependencyInjection\TuxOneSocialMetatagsExtension::load
     */
    public function testLoadSetParameters()
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $parameterBag = $this->getMockBuilder('Symfony\Component\DependencyInjection\ParameterBag\\ParameterBag')
            ->disableOriginalConstructor()
            ->getMock();

        $parameterBag
            ->expects($this->any())
            ->method('add');

        $container
            ->expects($this->any())
            ->method('getParameterBag')
            ->will($this->returnValue($parameterBag));

        $extension = new TuxOneSocialMetatagsExtension();
        $configs = array(
            array('twitter' => array('site' => 'foo')),
        );
        $extension->load($configs, $container);
    }

}
