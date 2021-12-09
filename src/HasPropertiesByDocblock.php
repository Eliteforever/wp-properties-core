<?php

namespace Eliteforever\WPPropertiesCore;

use Eliteforever\WPPropertiesCore\Registry\PropertyContainer;

trait HasPropertiesByDocblock
{
    private PropertyContainer $propertyRegistry;

    public function set(string $identifier, $value = null): void
    {
//        $this->propertyRegistry->set($propertyType, $identifier, $value);
    }
}
