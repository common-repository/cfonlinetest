<?php
/**
 * @package                 CFOnlineTest
 * @author                  CodeFootsteps Team
 * @license                 GPL-2.0-or-later
 * @link                    https://wordpress.org/plugins/cfonlinetest/
 * @copyright               2020 CF Online Test
 * 
 * @wordpress-plugin
 * Plugin Name:             CFOnlineTest
 * Plugin URI:              https://wordpress.org/plugins/cfonlinetest/
 * Description:             CF Online Test is a great online testing system that establishes an online testing tool for your website.
 * Version:                 1.0.0
 * Requires at least:       5.0
 * Requires PHP:            7.1
 * Author:                  CodeFootsteps Team
 * Author URI:              https://codefootsteps.com
 * License:                 GPL v2 or later
 * License URI:             http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:             /languages
 * Text Domain:             cfonlinetest
 */

/*
 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 
 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 
 Copyright 2020 CodeFootsteps, Inc.
 */
 
defined('ABSPATH')
    or die('No, you cannot run this file directly!');

// Check if plugin main class already exists
if (! class_exists('CF_Online_Test')) {
    /**
     * Online Test main class
     * @author CodeFootsteps Team
     *
     */
    class CF_Online_Test
    {
        /**
         * Initialization method
         */
        public static function init()
        {
            // First of all instantiate the constants
            self::setupConstants();
            // Include all required files
            self::includes();
            // Register plug-in activation hook
            register_activation_hook(__FILE__, array('CF_Online_Test', 'activate'));
            // Register plug-in deactivation hook
            register_deactivation_hook(__FILE__, array('CF_Online_Test', 'deactivate'));
            // add_action to init hook
            add_action('init', array('CFOT_Custom_Post_Type', 'registerCustomPostTypes'));
            add_action('init', array('CFOT_Custom_Post_Type', 'registerCustomTaxonomies'));
        }
        
        /**
         * Setup all plugin constants
         *
         * @since 1.0.0
         * @return void
         */
        private static function setupConstants()
        {
            define('CFOT_VERSION',              '1.0.0');
            define('CFOT_DB_VERSION',           '1.0.0');
            define('CFOT_URL',                  trailingslashit(plugin_dir_url(__FILE__)));
            define('CFOT_PATH',                 trailingslashit(plugin_dir_path( __FILE__ )));
            define('CFOT_ROOT',                 trailingslashit(dirname(plugin_basename(__FILE__))));
            define('CFOT_TEMPLATE_PATH',        'cfonlinetest/');
            define('CFOT_ADMIN_ASSETS_URL',     trailingslashit(plugin_dir_url(__FILE__) . 'assets/admin/'));
            define('CFOT_ADMIN_ASSETS_PATH',    trailingslashit(plugin_dir_path(__FILE__) . 'assets/admin/'));
            define('CFOT_PLUGIN_FILE',          __FILE__);
            define('CFOT_PLUGIN_BASENAME',      plugin_basename(__FILE__));
        }
        
        public static function includes()
        {
            require(CFOT_PATH . 'includes/class-ot-custom-post-type.php');
        }
        
        /**
         * Plug-in activate method
         */
        public static function activate()
        {
            // CFOT_Custom_Post_Type::registerCustomPostTypes();
            flush_rewrite_rules();
        }
        
        /**
         * Plug-in deactivate method
         */
        public static function deactivate()
        {
            // To-do
        }
    }
    
    CF_Online_Test::init();
}
