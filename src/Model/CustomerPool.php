<?php

declare(strict_types=1);

namespace Tavy315\SyliusCustomerPoolsPlugin\Model;

class CustomerPool implements CustomerPoolInterface
{
    /** @var mixed */
    protected $id;

    /** @var string|null */
    protected $code;

    /** @var string */
    protected $name = '';

    public function getId()
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
