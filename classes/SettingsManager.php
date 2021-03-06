<?php

namespace redgreenbird;

class SettingsManager
{

    // Holds the values to be used in the fields callbacks

    private $options;

    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }

    // Add options page
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Redirector',
            'Redirector',
            'manage_options',
            'my-setting-admin',
            array($this, 'create_admin_page')
        );
    }

    // Options page callback
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option('redirector_settings');
?>
        <div class="wrap">
            <h1>Redirector</h1>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('my_option_group');
                do_settings_sections('my-setting-admin');
                submit_button();
                ?>
            </form>
        </div>
<?php
    }

    // Register and add settings
    public function page_init()
    {
        register_setting(
            'my_option_group', // Option group
            'redirector_settings', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Redirector', // Title
            array($this, 'print_section_info'), // Callback
            'my-setting-admin' // Page
        );

        add_settings_field(
            'redirect_link', // ID
            'Page to redirect', // Title 
            array($this, 'title_callback'), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        if (isset($input['redirect_link']))
            $new_input['redirect_link'] = sanitize_text_field($input['redirect_link']);

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="redirect_link" name="redirector_settings[redirect_link]" value="%s" />',
            isset($this->options['redirect_link']) ? esc_attr($this->options['redirect_link']) : ''
        );
    }
}
