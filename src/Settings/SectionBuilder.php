<?php

namespace Eliteforever\WPPropertiesCore\Settings;

use Eliteforever\WPPropertiesCore\BuilderInterface;
use Eliteforever\WPPropertiesCore\PropertyBuilder;
use Eliteforever\WPPropertiesCore\PropertyContainerInterface;

class SectionBuilder implements BuilderInterface
{
    /** @var PropertyBuilder[] */
    private array $propertyBuilders = [];

    private ?PropertyContainerInterface $section;

    public function __construct(?PropertyContainerInterface $section = null)
    {
        $this->section = $section;
    }

    public function build(): SettingSection
    {


        $section = $this->section ?? new SettingSection();
        $section->registerProperties($this->propertyBuilders);

        return $section;
    }

    public function addProperty(string $key, PropertyBuilder $propertyBuilder): self
    {
        $this->propertyBuilders[$key] = $propertyBuilder;
        return $this;
    }

    /**
     * @param PropertyBuilder[] $propertyBuilder
     * @return $this
     */
    public function addProperties(array $propertyBuilder): self
    {
        $this->propertyBuilders = array_merge($this->propertyBuilders, $propertyBuilder);
        return $this;
    }

    public static function of(?PropertyContainerInterface $section = null): self
    {
        return new SectionBuilder($section);
    }
}
