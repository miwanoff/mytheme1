<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/miwanoff/
 * @since      1.0.0
 *
 * @package    Kit_Copyright
 * @subpackage Kit_Copyright/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Kit_Copyright
 * @subpackage Kit_Copyright/admin
 * @author     MAI <mai@gmail.com>
 */
class Kit_Copyright_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Kit_Copyright_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Kit_Copyright_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/kit-copyright-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Kit_Copyright_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Kit_Copyright_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/kit-copyright-admin.js', array('jquery'), $this->version, false);

    }

    public function add_plugin_admin_menu()
    {

        /*
         * Add a settings page for this plugin to the Settings menu.
         */
        add_options_page('Kit Copyright and Base Options Functions Setup', 'Kit Copyright', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
        );
    }

    /**
     * Add settings action link to the plugins page.
     */

    public function add_action_links($links)
    {

        $settings_link = array(
            '<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
        );
        return array_merge($settings_link, $links);

    }

    /**
     * Render the settings page for this plugin.
     */

    public function display_plugin_setup_page()
    {

        include_once 'partials/kit-copyright-admin-display.php';

    }

    /**
     * Validate options
     */
    public function validate($input)
    {
        $valid = array();
        $valid['footer_text'] = (isset($input['footer_text']) && !empty($input['footer_text'])) ? $input['footer_text'] : '';
        return $valid;
    }
/**
 * Update all options
 */
    public function options_update()
    {
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
    }

}