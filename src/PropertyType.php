<?php

namespace Eliteforever\WPPropertiesCore;

class PropertyType implements PropertyTypeInterface, PropertyTypeBuilder
{
    private string $key;
    private string $name;
    private ?PropertyType $parent;

    public function __construct(?string $key = null, ?string $name = null)
    {
        $this->key = $key ?? bin2hex(random_bytes(16));
        $this->name = $name ?? $this->key;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): PropertyTypeBuilder
    {
        $this->key = $key;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): PropertyTypeBuilder
    {
        $this->name = $name;
        return $this;
    }

    public function build(): PropertyTypeInterface
    {
        return $this;
    }
}
