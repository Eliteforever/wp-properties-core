<?php

namespace Eliteforever\WPPropertiesCore;

class PropertyType implements PropertyTypeInterface, PropertyTypeBuilder
{
    private string $key;
    private string $name;
    private ?PropertyType $parent;

    private \Closure $propertyFactory;
    private \Closure $propertyStore;

    public function __construct(
        callable $propertyFactory,
        callable $propertyStore,
        ?string $key = null,
        ?string $name = null
    ) {
        $this->key = $key ?? bin2hex(random_bytes(16));
        $this->name = $name ?? $this->key;
        $this->setPropertyFactory($propertyFactory);
        $this->setPropertyStore($propertyStore);
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPropertyFactory(): callable
    {
        return $this->propertyFactory;
    }

    public function setPropertyFactory(callable $propertyFactory): self
    {
        $this->propertyFactory = $propertyFactory;
        return $this;
    }

    public function setPropertyStore(callable $properyStore): self
    {
        $this->propertyStore = $properyStore;
        return $this;
    }

    public function build(): PropertyTypeInterface
    {
        return $this;
    }
}
