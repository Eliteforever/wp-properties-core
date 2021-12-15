<?php

namespace Eliteforever\WPPropertiesCore\Settings;

use Eliteforever\WPPropertiesCore\BuilderInterface;

class SectionBuilder implements BuilderInterface
{
    public function build(): Section
    {
        // TODO: Implement build() method.
    }

    public static function of(): BuilderInterface
    {
        return new SectionBuilder();
    }
}
