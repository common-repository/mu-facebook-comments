<?php
class MuFBSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'mufbc_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'mufbc_page_init' ) );
    }

    /**
     * Add options page
     */
    public function mufbc_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Facebook Comment Settings',
            'FB Comment',
            'manage_options',
            'mufbc_settings_admin',
            array( $this, 'mufbc_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function mufbc_admin_page()
    {
        // Set class property
        $this->options = get_option( 'mufbc_option' );
        ?>
        <div class="wrap">
            <h2>Facebook Comment Settings</h2>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields( 'mufbc_option_group' );
                do_settings_sections( 'mufbc_settings_admin' );

                submit_button();
                ?>
            </form>
        </div>
    <?php
    }

    /**
     * Register and add settings
     */
    public function mufbc_page_init()
    {
        register_setting(
            'mufbc_option_group', // Option group
            'mufbc_option', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'mufbc_setting_section', // ID
            'Facebook Comments Settings', // Title
            array( $this, 'print_mufbc_section' ), // Callback
            'mufbc_settings_admin' // Page
        );

        add_settings_field(
            'site_url', // ID
            'Website URL', // Title
            array( $this, 'site_url_callback' ), // Callback
            'mufbc_settings_admin', // Page
            'mufbc_setting_section' // Section
        );

        add_settings_field(
            'data_width',
            'Width of the comments box (in px)',
            array( $this, 'data_width_callback' ),
            'mufbc_settings_admin',
            'mufbc_setting_section'
        );

        add_settings_field(
            'data_numposts',
            'Number of comments to show',
            array( $this, 'data_numposts_callback' ),
            'mufbc_settings_admin',
            'mufbc_setting_section'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['mufbc_site_url'] ) )
            $new_input['mufbc_site_url'] = sanitize_text_field( $input['mufbc_site_url'] );

        if( isset( $input['mufbc_data_width'] ) )
            $new_input['mufbc_data_width'] = absint( $input['mufbc_data_width'] );

        if( isset( $input['mufbc_data_numposts'] ) )
            $new_input['mufbc_data_numposts'] = absint( $input['mufbc_data_numposts'] );

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_mufbc_section()
    {
        print 'Set the values for following fields';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function site_url_callback()
    {
        printf(
            '<input type="text" id="mufbc_site_url" name="mufbc_option[mufbc_site_url]" value="%s" />',
            isset( $this->options['mufbc_site_url'] ) ? esc_attr( $this->options['mufbc_site_url']) : ''
        );
    }

    /**
     * Get the settings option array and print consumer_secret value
     */
    public function data_width_callback()
    {
        printf(
            '<input type="text" id="mufbc_data_width" name="mufbc_option[mufbc_data_width]" value="%s" />',
            isset( $this->options['mufbc_data_width'] ) ? esc_attr( $this->options['mufbc_data_width']) : ''
        );
    }

    /**
     * Get the settings option array and print access_token value
     */
    public function data_numposts_callback()
    {
        printf(
            '<input type="text" id="mufbc_data_numposts" name="mufbc_option[mufbc_data_numposts]" value="%s" />',
            isset( $this->options['mufbc_data_numposts'] ) ? esc_attr( $this->options['mufbc_data_numposts']) : ''
        );
    }
}