<?php

namespace Eliteforever\WPPropertiesCore;

interface PropertyTypeInterface
{
    public function getKey(): string;

    public function getName(): string;
}
