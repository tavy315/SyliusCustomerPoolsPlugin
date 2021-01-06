<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Tavy315\SyliusCustomerPoolsPlugin\Model\CustomerPool;

class CustomerPoolRepository extends EntityRepository implements CustomerPoolRepositoryInterface
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(CustomerPool::class));
    }
}
