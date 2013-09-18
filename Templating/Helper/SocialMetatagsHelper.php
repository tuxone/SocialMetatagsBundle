<?php

namespace TuxOne\SocialMetatagsBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Templating\EngineInterface;

class SocialMetatagsHelper extends Helper
{
    protected $templating;
    protected $twitter_service_account;

    public function __construct(EngineInterface $templating, $twitter_service_account)
    {
        $this->templating               = $templating;
        $this->twitter_service_account    = $twitter_service_account;
    }

    public function initialize($parameters = array(), $name = null)
    {
        $name = $name ?: 'TuxOneSocialMetatagsBundle::initialize.html.php';

        return $this->templating->render($name, $parameters + array(
            'twitter_service_account' => $this->twitter_service_account,
        ));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getName()
    {
        return 'socialmetatags';
    }
}
