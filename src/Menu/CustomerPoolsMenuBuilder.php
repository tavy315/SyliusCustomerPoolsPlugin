<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\Menu;

use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class CustomerPoolsMenuBuilder
{
    public function addCustomerPools(MenuBuilderEvent $event): void
    {
        /** @var ItemInterface $marketingMenu */
        $marketingMenu = $event->getMenu()->getChild('customers');

        $marketingMenu->addChild('customer_pools', ['route' => 'tavy315_sylius_customer_pools_admin_customer_pool_index'])
                      ->setLabel('tavy315_sylius_customer_pools.ui.customer_pools')
                      ->setLabelAttribute('icon', 'user secret');
    }
}
