<?php

namespace TuxOne\SocialMetatagsBundle\Tests\Twig\Extension;

use TuxOne\SocialMetatagsBundle\Twig\Extension\SocialMetatagsExtension;
use TuxOne\SocialMetatagsBundle\Templating\Helper\SocialMetatagsHelper;

class SocialMetatagsExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers TuxOne\SocialMetatagsBundle\Twig\Extension\SocialMetatagsExtension::getName
     */
    public function testGetName()
    {
        $containerMock = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $extension = new SocialMetatagsExtension($containerMock);
        $this->assertSame('socialmetatags', $extension->getName());
    }

    /**
     * @covers TuxOne\SocialMetatagsBundle\Twig\Extension\SocialMetatagsExtension::getFunctions
     */
    public function testGetFunctions()
    {
        $containerMock = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $extension = new SocialMetatagsExtension($containerMock);
        $functions = $extension->getFunctions();
        $this->assertInstanceOf('\Twig_Function_Method', $functions['socialmetatags_initialize']);
    }

    /**
     * @covers TuxOne\SocialMetatagsBundle\Twig\Extension\SocialMetatagsExtension::renderInitialize
     */
    public function testRenderInitialize()
    {
        $helperMock = $this->getMockBuilder('TuxOne\SocialMetatagsBundle\Templating\Helper\SocialMetatagsHelper')
            ->disableOriginalConstructor()
            ->getMock();
        $helperMock->expects($this->once())
            ->method('initialize')
            ->will($this->returnValue('returnedValue'));
        $containerMock = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $containerMock->expects($this->once())
            ->method('get')
            ->with('tuxone_socialmetatags.helper')
            ->will($this->returnValue($helperMock));

        $extension = new SocialMetatagsExtension($containerMock);
        $this->assertSame('returnedValue', $extension->renderInitialize());
    }
}
