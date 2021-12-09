<?php

namespace Eliteforever\WPPropertiesCore;

interface PropertyTypeBuilder
{
    public function setKey(string $key): self;

    public function setName(string $name): self;

    public function setPropertyFactory(callable $propertyFactory): self;

    public function setPropertyStore(callable $properyStore): self;

    public function build(): PropertyTypeInterface;
}
