<?php

namespace Eliteforever\WPPropertiesCore;

use Eliteforever\WPPropertiesCore\Store\PropertyStoreInterface;

abstract class PropertyBuilder implements PropertyBuilderInterface
{
    private string $key;
    private string $name;
    private ?PropertyBuilder $parent;

    private \Closure $propertyFactory;
    protected PropertyStoreInterface $store;

    public function __construct(
        callable $propertyFactory,
        PropertyStoreInterface $store,
        ?string $key = null,
        ?string $name = null
    ) {
        $this->key = $key ?? bin2hex(random_bytes(16));
        $this->name = $name ?? $this->key;
        $this->setPropertyFactory($propertyFactory);
        $this->setStore($store);
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

    public function setStore(PropertyStoreInterface $store): self
    {
        $this->store = $store;
        return $this;
    }

    public function getStore(): PropertyStoreInterface
    {
        return $this->store;
    }

    public function setRules(array $rules): PropertyBuilderInterface
    {
        // TODO: Implement and use $rules.

        return $this;
    }
}
