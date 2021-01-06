<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\Model\Channel;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Channel as BaseChannel;
use Tavy315\SyliusCustomerPoolsPlugin\Model\Customer\CustomerPoolAwareInterface;
use Tavy315\SyliusCustomerPoolsPlugin\Model\Customer\CustomerPoolTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_channel")
 */
final class Channel extends BaseChannel implements CustomerPoolAwareInterface
{
    use CustomerPoolTrait;
}
