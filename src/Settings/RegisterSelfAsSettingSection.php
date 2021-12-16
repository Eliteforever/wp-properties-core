<?php

namespace Eliteforever\WPPropertiesCore\Settings;

use Eliteforever\WPPropertiesCore\PropertyBuilder;

trait RegisterSelfAsSettingSection
{
    public function registerSectionSetting(SectionBuilder $section): SettingSection
    {
        $section->addProperties($this->propertiesToInitialize());

        return $section->build();
    }

    /**
     * @return PropertyBuilder[]
     */
    abstract protected function propertiesToInitialize(): array;
}
