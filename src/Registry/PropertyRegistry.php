<?php

namespace Eliteforever\WPPropertiesCore\Registry;

use Eliteforever\WPPropertiesCore\Property;
use Eliteforever\WPPropertiesCore\PropertyTypeInterface;

class PropertyRegistry
{
    /** @var Property[] */
    private array $properties = [];

    /**
     * @param PropertyTypeInterface[] $properties
     */
    public function initialize(array $properties): void
    {
        foreach ($properties as $name => $type) {
            $this->add($type, $name);
        }
    }

    public function set(string $identifier, $value = null): void
    {
        $this->get($identifier)->value = $value;
    }

    public function add(PropertyTypeInterface $propertyType, string $identifier, $value = null): Property
    {
        $property = new Property($propertyType, $identifier, $value);

        $this->properties[$identifier] = $property;

        return $property;
    }

    public function get(string $identifier): ?Property
    {
        return $this->properties[$identifier] ?? null;
    }
}