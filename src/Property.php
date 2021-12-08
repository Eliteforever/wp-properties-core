<?php

namespace Eliteforever\WPPropertiesCore;

use Eliteforever\WPPropertiesCore\Registry\PropertyRegistry;

class Property
{
    private PropertyTypeInterface $type;
    public string $identifier;
    private bool $validation = false;
    public $value;

    public function __construct(PropertyTypeInterface $type, string $identifier, $value)
    {
        $this->type = $type;
        $this->identifier = $identifier;
        $this->value = $value;
    }

    public static function get(string $identifier): ?Property
    {
        return PropertyRegistry::of()->get($identifier);
    }

    public static function createType(): PropertyTypeBuilder
    {
        return new PropertyType();
    }
}
