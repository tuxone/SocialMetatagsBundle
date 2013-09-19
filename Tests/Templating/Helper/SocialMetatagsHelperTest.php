<?php

namespace TuxOne\SocialMetatagsBundle\Tests\Templating\Helper;

use TuxOne\SocialMetatagsBundle\Templating\Helper\SocialMetatagsHelper;

class SocialMetatagsHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers TuxOne\SocialMetatagsBundle\Templating\Helper\SocialMetatagsHelper::initialize
     */
    public function testInitialize()
    {
        $expected = new \stdClass();

        $templating = $this->getMockBuilder('Symfony\Component\Templating\DelegatingEngine')
            ->disableOriginalConstructor()
            ->getMock();
        $templating
            ->expects($this->once())
            ->method('render')
            ->with('TuxOneSocialMetatagsBundle::initialize.html.php', array(
                'image' => null,
                'twitter_site' => 'foo',
                'twitter_app_id_googleplay' => null,
                'twitter_app_id_iphone' => null,
                'twitter_app_id_ipad' => null,
            ))
            ->will($this->returnValue($expected));

        $helper = new SocialMetatagsHelper($templating, null, 'foo');
        $this->assertSame($expected, $helper->initialize(array()));
    }
}
