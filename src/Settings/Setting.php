<?php

namespace Eliteforever\WPPropertiesCore\Settings;

use Eliteforever\WPPropertiesCore\Property;
use Eliteforever\WPPropertiesCore\PropertyType;

class Setting extends Property
{
    public function __construct(PropertyType $type)
    {
        parent::__construct($type);
    }
}
