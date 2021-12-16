<?php

namespace Eliteforever\WPPropertiesCore;

interface PropertyContainerInterface
{
    public function registerProperties(array $propertiesToInitialize);

    /**
     * @return Property[]
     */
    public function getProperties(): array;
}
