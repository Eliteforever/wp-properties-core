<?php

namespace Eliteforever\WPPropertiesCore\Store;

use Eliteforever\WPPropertiesCore\Property;

interface PropertyStoreInterface
{
    public function load(Property $property);

    public function store(Property $property);
}
