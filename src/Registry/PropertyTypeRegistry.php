<?php

namespace Eliteforever\WPPropertiesCore\Registry;

use Eliteforever\WPPropertiesCore\BuilderInterface;

class PropertyTypeRegistry
{
    /** @var BuilderInterface[] */
    private array $propertyTypes = [];

    public static function of(): self
    {
        return once(fn(): self => new static());
    }

    public function add(BuilderInterface ...$properties): void
    {
        foreach ($properties as $builder) {
            $property = $builder->build();

            $this->propertyTypes[$property->identifier] = $property;
        }
    }

    public function get(string $key): ?BuilderInterface
    {
        return $this->propertyTypes[$key] ?? null;
    }

    public function all(): array
    {
        return $this->propertyTypes;
    }
}
