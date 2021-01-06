<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

final class Tavy315SyliusCustomerPoolsPlugin extends AbstractResourceBundle
{
    use SyliusPluginTrait;

    public function getSupportedDrivers(): array
    {
        return [
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        ];
    }

    protected function getModelNamespace(): string
    {
        return 'Tavy315\SyliusCustomerPoolsPlugin\Model';
    }
}
