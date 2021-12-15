<?php

namespace Eliteforever\WPPropertiesCore;

use Eliteforever\WPPropertiesCore\Registry\PropertyContainer;

trait HasProperties
{
    private PropertyContainer $propertyContainer;

    final protected function registerProperties()
    {
        $this->propertyContainer = new PropertyContainer();

        $this->propertyContainer->initialize($this->properties());

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
     * @return PropertyBuilder[]
     */
    abstract protected function properties(): array;
}
