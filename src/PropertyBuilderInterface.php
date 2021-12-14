<?php

namespace Eliteforever\WPPropertiesCore;

use Eliteforever\WPPropertiesCore\Store\PropertyStoreInterface;

interface PropertyBuilderInterface
{
    public function setKey(string $key): self;

    public function setName(string $name): self;

    public function setPropertyFactory(callable $propertyFactory): self;

    public function setStore(PropertyStoreInterface $properyStore): self;

    public function setRules(array $rules): self;

    public function getKey(): string;

    public function getName(): string;

    public function getPropertyFactory(): callable;

    public function getStore(): PropertyStoreInterface;

    public function build(): Property;
}
