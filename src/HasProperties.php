<?php

namespace Eliteforever\WPPropertiesCore;

use Eliteforever\WPPropertiesCore\Registry\PropertyRegistry;

trait HasProperties
{
    private PropertyRegistry $propertyRegistry;

    public function set(string $identifier, $value = null): void
    {
//        $this->propertyRegistry->set($propertyType, $identifier, $value);
    }
}
