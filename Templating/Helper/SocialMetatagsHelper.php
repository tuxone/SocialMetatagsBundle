<?php

namespace TuxOne\SocialMetatagsBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Templating\EngineInterface;

class SocialMetatagsHelper extends Helper
{
    protected $templating;
    protected $twitter_site;
    protected $image;
    protected $twitter_app_id_googleplay;
    protected $twitter_app_id_iphone;
    protected $twitter_app_id_ipad;

    public function __construct(EngineInterface $templating,
                                $image = null,
                                $twitter_site, $twitter_app_id_googleplay = null, $twitter_app_id_iphone = null, $twitter_app_id_ipad = null)
    {
        $this->templating                   = $templating;
        $this->image                        = $image;
        $this->twitter_site                 = $twitter_site;
        $this->twitter_app_id_googleplay    = $twitter_app_id_googleplay;
        $this->twitter_app_id_iphone        = $twitter_app_id_iphone;
        $this->twitter_app_id_ipad          = $twitter_app_id_ipad;
    }

    public function initialize($parameters = array(), $name = null)
    {
        $name = $name ?: 'TuxOneSocialMetatagsBundle::initialize.html.php';

        return $this->templating->render($name, $parameters + array(
                'image'                     => $this->image,
                'twitter_site'              => $this->twitter_site,
                'twitter_app_id_googleplay' => $this->twitter_app_id_googleplay,
                'twitter_app_id_iphone'     => $this->twitter_app_id_iphone,
                'twitter_app_id_ipad'       => $this->twitter_app_id_ipad,
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
