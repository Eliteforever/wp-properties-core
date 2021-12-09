<?php

namespace Eliteforever\WPPropertiesCore;

/**
 * @property mixed value
 * @property mixed wordpressValue
 */
class Property
{
    public string $identifier;
    private bool $validation = false;
    protected PropertyTypeInterface $type;
    protected $internalValue = null;
    protected $internalWordpressValue = null;

    public function __construct(PropertyTypeInterface $type, string $identifier, $value)
    {
        $this->type = $type;
        $this->identifier = $identifier;
        $this->internalValue = $value;
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'value':
                $this->internalValue = $value;
                break;
            case 'wordpressValue':
                $this->internalWordpressValue = $value;
                break;
        }
    }

    public function __get($name)
    {
        switch ($name) {
            case 'value':
                return $this->internalValue;
            case 'wordpressValue':
                return $this->internalWordpressValue;
        }

        throw new \Exception("Property $name does not exist.");
    }

    public function load()
    {
        return $this->__get($this->type->getName());
    }
}
