<?php

namespace Eliteforever\WPPropertiesCore\Registry;

use Eliteforever\WPPropertiesCore\Property;
use Eliteforever\WPPropertiesCore\PropertyBuilder;

class PropertyContainer
{
    /** @var Property[] */
    private array $properties = [];

    /**
     * @param PropertyBuilder[] $properties
     */
    public function initialize(array $properties): void
    {
        $this->properties = collect($properties)
            ->map(fn(PropertyBuilder $builder, string $key) => $builder->setKey($builder->getKey() ?? $key))
            ->map(fn(PropertyBuilder $builder) => $builder->build())
            ->each(fn(Property $property) => $this->add($property))
            ->toArray();
    }

    public function set(string $identifier, $value): void
    {
        $this->get($identifier)->value = $value;
    }

    public function add(Property $property): Property
    {
        $this->properties[$property->identifier] = $property;

        return $property;
    }

    public function get(string $identifier): ?Property
    {
        return $this->properties[$identifier] ?? null;
    }

    /**
     * @return Property[]
     */
    public function all(): array
    {
        return $this->properties;
    }
}
