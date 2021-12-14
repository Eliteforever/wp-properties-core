<?php

namespace Eliteforever\WPPropertiesCore\Settings;

use Eliteforever\WPPropertiesCore\Property;
use Eliteforever\WPPropertiesCore\PropertyBuilder;

class SettingBuilder extends PropertyBuilder
{
    public function __construct(?string $key = null, ?string $name = null)
    {
        parent::__construct(
            fn(string $identifier) => new Setting($identifier),
            new SettingStore(),
            $key,
            $name
        );
    }

    public function build(): Property
    {
        $property = $this->getPropertyFactory()($this->getKey());

        add_action('admin_init', function () use ($property) {
            register_setting(
                'general',
                $property->identifier,
                [
                    'sanitize_callback' => function ($value) use ($property) {
                        return $value;
                    }
                ]
            );
            add_settings_section(
                'testing-area',
                'Testing Area',
                '__return_false',
                'general'
            );
            add_settings_field(
                $property->identifier,
                'Enter custom message',
                function () use ($property) {
                    $value = $property->value;
                    echo "<input 
id={$property->identifier}
name={$property->identifier}
size='40' 
type='text' 
value={$value}
/>";
                },
                'general',
                'testing-area'
            );
        });

        return $property;
    }
}
