<?php

namespace Eliteforever\WPPropertiesCore\Settings;

use Eliteforever\WPPropertiesCore\Property;
use Eliteforever\WPPropertiesCore\PropertyBuilder;
use Illuminate\Support\Str;

class SettingBuilder extends PropertyBuilder
{
    private ?string $title = null;

    public function __construct()
    {
        parent::__construct(
            fn(string $identifier) => new Setting($identifier),
        );
    }

    public function build(): Property
    {
        $property = $this->getPropertyFactory()($this->getKey());
        $this->title ??= Str::title($this->getKey());

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
                $this->getTitle(),
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

    public function setTitle(string $label): self
    {
        $this->title = $label;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public static function of(): self
    {
        return (new SettingBuilder())
            ->setStore(new SettingStore());
    }
}
