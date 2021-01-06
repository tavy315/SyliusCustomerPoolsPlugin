<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\EventSubscriber\AddCodeFormSubscriber;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class CustomerPoolType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'tavy315_sylius_customer_pools.ui.name',
            ])
            ->addEventSubscriber(new AddCodeFormSubscriber());
    }

    public function getBlockPrefix(): string
    {
        return 'tavy315_sylius_customer_pools_plugin_customer_pool';
    }
}
