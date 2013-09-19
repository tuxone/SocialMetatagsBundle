<?php

namespace TuxOne\SocialMetatagsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder,
    Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class contains the configuration information for the bundle
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 *
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tuxone_socialmetatags');

        $rootNode
            ->fixXmlConfig('permission', 'permissions')
            ->children()
                ->arrayNode('twitter')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('site')->defaultValue('cyberalexgm')->end()
                        ->scalarNode('app_id_iphone')->defaultNull()->end()
                        ->scalarNode('app_id_ipad')->defaultNull()->end()
                        ->scalarNode('app_id_googleplay')->defaultNull()->end()
                    ->end()
                ->end()
                ->scalarNode('image')->defaultNull()->end()
                /*->scalarNode('secret')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('cookie')->defaultFalse()->end()
                ->scalarNode('domain')->defaultNull()->end()
                ->scalarNode('alias')->defaultNull()->end()
                ->scalarNode('culture')->defaultValue('en_US')->end()*/
                ->arrayNode('class')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('helper')->defaultValue('TuxOne\SocialMetatagsBundle\Templating\Helper\SocialMetatagsHelper')->end()
                        ->scalarNode('twig')->defaultValue('TuxOne\SocialMetatagsBundle\Twig\Extension\SocialMetatagsExtension')->end()
                    ->end()
                ->end()
                /*->arrayNode('channel')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('expire')->defaultValue(60*60*24*365)->end()
                    ->end()
                ->end()
                ->arrayNode('permissions')->prototype('scalar')->end()*/
            ->end();

        return $treeBuilder;
    }
}
