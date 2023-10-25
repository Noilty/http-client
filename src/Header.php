<?php

declare(strict_types=1);

namespace Noilty\Http\Client;

class Header
{
    public function __construct
    (
        private string $name,
        private string $value
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
