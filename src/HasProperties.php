<?php

namespace Eliteforever\WPPropertiesCore;

use Eliteforever\WPPropertiesCore\Registry\PropertyContainer;
use Eliteforever\WPPropertiesCore\Registry\PropertyTypeRegistry;

trait HasProperties
{
    private PropertyContainer $propertyContainer;

    final protected function registerProperties()
    {
        $this->propertyContainer = new PropertyContainer();

        $propertyTypeRegistry = PropertyTypeRegistry::of();

        // TODO: Use reflection to retrieve properties of type "^Setting", use its name for the key:
        $this->propertyContainer->initialize(
            [
                'first' => $propertyTypeRegistry->get('hello-property'),
            ]
        );

        $this->bindProperties();
    }

    final protected function bindProperties()
    {
        foreach ($this->propertyContainer->all() as $name => $property) {
            $this->$name = $property;
        }
    }

    final protected function loadProperties()
    {
        foreach ($this->propertyContainer->all() as $property) {
            $property->load();
        }
    }
}
