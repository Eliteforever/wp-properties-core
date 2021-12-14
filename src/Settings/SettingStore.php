<?php

namespace Eliteforever\WPPropertiesCore\Settings;

use Eliteforever\WPPropertiesCore\Property;
use Eliteforever\WPPropertiesCore\Store\PropertyStoreInterface;

class SettingStore implements PropertyStoreInterface
{
    public function load(Property $property)
    {
        return get_option($property->identifier);
    }

    public function store(Property $property)
    {
        $identifier = $property->identifier;
        $value = $property->getInternalValue();

        if ($property->getInternalValue()) {
            if (!update_option($identifier, $value)) {
                throw new \InvalidArgumentException(
                    "Could not update option {identifier} with $value. 
                Debug the internal 'update_option' call to find out why."
                );
            }
        } else {
            delete_option($identifier);
        }
    }

}
