<?php

namespace Eliteforever\WPPropertiesCore\Settings;

use Eliteforever\WPPropertiesCore\Property;
use Eliteforever\WPPropertiesCore\PropertyType;
use Eliteforever\WPPropertiesCore\PropertyTypeBuilder;
use Eliteforever\WPPropertiesCore\PropertyTypeInterface;

class Setting extends Property
{
    public static function createType(): PropertyTypeBuilder
    {
        return new SettingType();
    }

    public function __set($name, $value)
    {
        if (!update_option($this->type->getName(), $value)) {
            throw new \InvalidArgumentException(
                "Could not update option {$this->type->getName()} with $value. 
                Debug the internal 'update_option' call to find out why."
            );
        }

        parent::__set($name, $value);
    }

    public function load()
    {
        $value = get_option($this->type->getName());

        if (!$value) {
            throw new \InvalidArgumentException(
                "Could not retrieve option {$this->type->getName()}. 
                Debug the internal 'get_option' call to find out why."
            );
        }

        return parent::load();
    }
}
