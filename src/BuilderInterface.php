<?php

namespace Eliteforever\WPPropertiesCore;

interface BuilderInterface
{
    public function build();

    public static function of(): self;
}
