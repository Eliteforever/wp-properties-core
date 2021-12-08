<?php

namespace Eliteforever\WPPropertiesCore\Registry;

use Eliteforever\WPPropertiesCore\PropertyTypeBuilder;
use Eliteforever\WPPropertiesCore\PropertyTypeInterface;

class PropertyTypeRegistry
{
    /** @var PropertyTypeInterface[] */
    private array $propertyTypes = [];

    public static function of(): self
    {
        return once(fn(): self => new static());
    }

    public function add(PropertyTypeBuilder ...$propertyTypes): void
    {
        foreach ($propertyTypes as $propertyType) {
            $builtPropertyType = $propertyType->build();

            $this->propertyTypes[$builtPropertyType->getName()] = $propertyType;
        }
    }

    public function get(string $key): ?PropertyTypeInterface
    {
        return $this->propertyTypes[$key] ?? null;
    }
}
