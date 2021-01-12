# Sylius Customer Pools Plugin

[![Latest Version][ico-version]][link-packagist]
[![Latest Unstable Version][ico-unstable-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-github-actions]][link-github-actions]

This plugin for [Sylius](https://sylius.com/) allows you to manage customer pools.

Supports Doctrine ORM driver only.

Customer Pool is a collection of Customers that is assigned to a specific channel. Thanks to this concept, if you have two channels, each of them has a separate customer pool, then customers that have accounts in channel A, and have not registered in channel B, will not be able to log in to channel B with credentials they have specified in channel A (which is the behaviour happening in Sylius open source edition). This feature allows you to sell via multiple channels, creating a illusion of shopping in completely different stores, while you still have one administration panel.

## Screenshots

Customer Pools:

![Screenshot showing admin customer pools](docs/images/admin-customer-pools-index.png)

Customer:

![Screenshot showing admin customer](docs/images/admin-customer-pools-edit.png)

## Installation

### Step 1: Install the plugin

Open a command console, enter your project directory and execute the following command to download the latest stable version of this plugin:

```bash
$ composer require tavy315/sylius-customer-pools-plugin
```

This command requires you to have Composer installed globally, as explained in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the Composer documentation.

### Step 2: Enable the plugin

Then, enable the plugin by adding it to the list of registered plugins/bundles in `config/bundles.php` file of your project:

```php
<?php
$bundles = [
    Tavy315\SyliusCustomerPoolsPlugin\Tavy315SyliusCustomerPoolsPlugin::class => ['all' => true],
];
```

### Step 3: Configure the plugin
```yaml
# config/packages/tavy315_sylius_customer_pools.yaml

imports:
    - { resource: "@Tavy315SyliusCustomerPoolsPlugin/Resources/config/app/config.yaml" }
```

### Step 4: Customize models

Read more about Sylius models customization [here](https://docs.sylius.com/en/latest/customization/model.html).

#### Customize your Customer model

Add a `Tavy315\SyliusCustomerPoolsPlugin\Model\Customer\CustomerPoolTrait` trait to your `App\Entity\Customer\Customer` class.

- If you use `annotations` mapping:

    ```php
    <?php 
    // src/Entity/Customer/Customer.php
    
    namespace App\Entity\Customer;

    use Doctrine\ORM\Mapping as ORM;
    use Sylius\Component\Core\Model\Customer as BaseCustomer;
    use Tavy315\SyliusCustomerPoolsPlugin\Model\Customer\CustomerPoolAwareInterface;
    use Tavy315\SyliusCustomerPoolsPlugin\Model\Customer\CustomerPoolTrait;
      
    /**
     * @ORM\Entity
     * @ORM\Table(name="sylius_customer")
     */
    class Customer extends BaseCustomer implements CustomerPoolAwareInterface
    {
        use CustomerPoolTrait;
    }
    ```

### Step 5: Update your database schema

```bash
$ php bin/console doctrine:migrations:diff
$ php bin/console doctrine:migrations:migrate
```

### Step 6: Add UserChecker to security.yaml

This will restrict the user to login to a Channel having different Customer Pool setup. If no Customer Pool is selected on the customer or current channel, it will skip the check and allow login.

```yaml
security:
    firewalls:
        shop:
            user_checker: tavy315_sylius_customer_pools.security.user_checker
```

## Usage

From now, you can attach a customer pool to any customer.

[ico-version]: https://poser.pugx.org/tavy315/sylius-customer-pools-plugin/v/stable
[ico-unstable-version]: https://poser.pugx.org/tavy315/sylius-customer-pools-plugin/v/unstable
[ico-license]: https://poser.pugx.org/tavy315/sylius-customer-pools-plugin/license
[ico-github-actions]: https://github.com/tavy315/SyliusCustomerPoolsPlugin/workflows/build/badge.svg
[ico-code-quality]: https://img.shields.io/scrutinizer/g/tavy315/SyliusCustomerPoolsPlugin.svg

[link-packagist]: https://packagist.org/packages/tavy315/sylius-customer-pools-plugin
[link-github-actions]: https://github.com/tavy315/SyliusCustomerPoolsPlugin/actions
