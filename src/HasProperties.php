<?php

namespace Eliteforever\WPPropertiesCore;

use Eliteforever\WPPropertiesCore\Registry\PropertyContainer;

trait HasProperties
{
    private PropertyContainer $propertyContainer;

    final public function registerProperties(array $propertiesToInitialize): void
    {
        $this->propertyContainer = new PropertyContainer();

        $this->propertyContainer->initialize($propertiesToInitialize);

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

    /**
     * @return Property[]
     */
    final public function getProperties(): array
    {
        return $this->propertyContainer->all();
    }
}
