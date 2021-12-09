<?php

namespace Eliteforever\WPPropertiesCore\Settings;

use Eliteforever\WPPropertiesCore\Property;
use Eliteforever\WPPropertiesCore\PropertyType;
use Eliteforever\WPPropertiesCore\PropertyTypeInterface;

class SettingType extends PropertyType
{
    public function __construct(?string $key = null, ?string $name = null)
    {
        parent::__construct(
            fn(PropertyTypeInterface $type, string $identifier, $value) => new Setting($type, $identifier, $value),
            fn(Property $property) => update_option($property->identifier, $property->value),
            $key,
            $name
        );
    }

    public function build(): PropertyTypeInterface
    {
        // TODO: Register the WP way.
        // register_setting();

        add_action('admin_init', function () {
            register_setting(
                'general',
                'html_guidelines_message',
                'esc_html' // <--- Customize this if there are multiple fields
            );
            add_settings_section(
                'site-guide',
                'Publishing Guidelines',
                '__return_false',
                'general'
            );
            add_settings_field(
                'html_guidelines_message',
                'Enter custom message',
                function () {
                    echo '<h1>Bla.</h1>';
                },
                'general',
                'site-guide'
            );
        });

        return $this;
    }
}
