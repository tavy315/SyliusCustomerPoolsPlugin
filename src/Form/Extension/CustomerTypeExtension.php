<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\Form\Extension;

use Sylius\Bundle\CustomerBundle\Form\Type\CustomerType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Tavy315\SyliusCustomerPoolsPlugin\Form\Type\CustomerPoolChoiceType;

final class CustomerTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('customerPool', CustomerPoolChoiceType::class, [
                'required' => false,
            ])
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [CustomerType::class];
    }
}
