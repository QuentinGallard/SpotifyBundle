<?php

namespace Nomad145\SpotifyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('spotify');

        $rootNode
            ->children()
                ->scalarNode('client_id')
                    ->isRequired()
                    ->end()
                ->scalarNode('client_secret')
                    ->isRequired()
                    ->end()
                ->scalarNode('redirect_uri')
                    ->defaultValue('')
                    ->end()
                ->arrayNode('scopes')
                    ->prototype('scalar')
                    ->end()
            ->end();

        return $treeBuilder;
    }
}
