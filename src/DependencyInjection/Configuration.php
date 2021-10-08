<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\DependencyInjection;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Component\Resource\Factory\Factory;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Tavy315\SyliusCustomerPoolsPlugin\Form\Type\CustomerPoolType;
use Tavy315\SyliusCustomerPoolsPlugin\Model\CustomerPool;
use Tavy315\SyliusCustomerPoolsPlugin\Repository\CustomerPoolRepository;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('tavy315_sylius_customer_pools');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
            ->end()
        ;

        $this->addResourcesSection($rootNode);

        return $treeBuilder;
    }

    private function addResourcesSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
            ->arrayNode('resources')
                ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('customer_pool')
                    ->addDefaultsIfNotSet()
                    ->children()
                            ->variableNode('options')->end()
                            ->arrayNode('classes')
                                ->addDefaultsIfNotSet()
                                ->children()
                                        ->scalarNode('model')->defaultValue(CustomerPool::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->scalarNode('form')->defaultValue(CustomerPoolType::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->defaultValue(CustomerPoolRepository::class)->cannotBeEmpty()->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
