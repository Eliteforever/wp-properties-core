<?php

namespace Eliteforever\WPPropertiesCore;

class SettingType extends PropertyType
{
    public function __construct(?string $key = null, ?string $name = null)
    {
        parent::__construct($key, $name);
    }

    public function build(): PropertyTypeInterface
    {
        // TODO: Register the WP way.
        // register_setting();

        return $this;
    }
}
