<?php

namespace Eliteforever\WPPropertiesCore\Registry;

use Eliteforever\WPPropertiesCore\PropertyBuilderInterface;

class PropertyTypeRegistry
{
    /** @var PropertyBuilderInterface[] */
    private array $propertyTypes = [];

    public static function of(): self
    {
        return once(fn(): self => new static());
    }

    public function add(PropertyBuilderInterface ...$properties): void
    {
        foreach ($properties as $builder) {
            $property = $builder->build();

            $this->propertyTypes[$property->identifier] = $property;
        }
    }

    public function get(string $key): ?PropertyBuilderInterface
    {
        return $this->propertyTypes[$key] ?? null;
    }

    public function all(): array
    {
        return $this->propertyTypes;
    }
}
