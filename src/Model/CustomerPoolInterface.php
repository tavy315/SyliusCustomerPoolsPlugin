<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\Model;

use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface CustomerPoolInterface extends CodeAwareInterface, ResourceInterface
{
    public function getName(): string;

    public function setName(string $name): void;
}
