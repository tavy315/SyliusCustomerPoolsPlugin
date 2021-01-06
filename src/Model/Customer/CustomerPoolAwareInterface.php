<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\Model\Customer;

use Tavy315\SyliusCustomerPoolsPlugin\Model\CustomerPoolInterface;

interface CustomerPoolAwareInterface
{
    public function getCustomerPool(): ?CustomerPoolInterface;

    public function setCustomerPool(?CustomerPoolInterface $customerPool): void;
}
