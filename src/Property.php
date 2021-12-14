<?php

namespace Eliteforever\WPPropertiesCore;

/**
 * @property mixed value
 */
abstract class Property
{
    public string $identifier;

    protected bool $dirty = false;
    protected $internalValue = null;
    protected $rawValue = null;

    public function __construct(string $identifier, $value = null)
    {
        $this->identifier = $identifier;

        $value === null
            ? $this->loadValue()
            : $this->setValue($value);
    }

    public function __set($name, $value)
    {
        if ($name !== 'value') {
            throw new \InvalidArgumentException("Property $name does not exist");
        }

        if ($this->rawValue === null) {
            return;
        }

        if ($value !== $this->internalValue) {
            // TODO: Validate value
            $this->setValue($value);
            $this->dirty = true;
        }

        if ($this->dirty) {
            $this->store($this->internalValue);
        }
    }

    public function __get($name)
    {
        if ($name !== 'value') {
            throw new \InvalidArgumentException("Property $name does not exist");
        }

        if ($this->dirty) {
            $this->loadValue();
            $this->dirty = false;
        }

        return $this->internalValue;
    }

    public function isDirty(): bool
    {
        return $this->dirty;
    }

    public function getInternalValue()
    {
        return $this->internalValue;
    }

    protected function setValue($value)
    {
        $this->internalValue = $value;
        $this->rawValue = $this->deserializeValue();
    }

    protected function loadValue()
    {
        $this->rawValue = $this->load();
        $this->internalValue = $this->serializeValue();
    }

    protected function serializeValue()
    {
        return $this->rawValue;
    }

    protected function deserializeValue()
    {
        return $this->internalValue;
    }

    abstract public function load();

    abstract public function store($value);
}
