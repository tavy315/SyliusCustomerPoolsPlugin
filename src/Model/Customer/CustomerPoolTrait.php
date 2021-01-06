<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\Model\Customer;

use Doctrine\ORM\Mapping as ORM;
use Tavy315\SyliusCustomerPoolsPlugin\Model\CustomerPoolInterface;

trait CustomerPoolTrait
{
    /**
     * @var CustomerPoolInterface|null
     * @ORM\ManyToOne(targetEntity="Tavy315\SyliusCustomerPoolsPlugin\Model\CustomerPool")
     * @ORM\JoinColumn(name="customer_pool", referencedColumnName="id", nullable=true)
     */
    protected $customerPool;

    public function getCustomerPool(): ?CustomerPoolInterface
    {
        return $this->customerPool;
    }

    public function setCustomerPool(?CustomerPoolInterface $customerPool): void
    {
        $this->customerPool = $customerPool;
    }
}
