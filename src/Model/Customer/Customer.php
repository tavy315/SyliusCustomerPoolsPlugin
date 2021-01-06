<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\Model\Customer;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Customer as BaseCustomer;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_customer")
 */
final class Customer extends BaseCustomer implements CustomerPoolAwareInterface
{
    use CustomerPoolTrait;
}
