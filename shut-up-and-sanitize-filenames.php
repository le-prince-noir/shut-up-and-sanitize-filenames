<?php

/**
 * Plugin Name:       Shut up and sanitize filenames
 * Plugin URI:        http://www.samy-kantari.fr/
 * Description:       Sanitize filenames
 * Version:           1.0.0
 * Author:            Kantari Samy
 * Author URI:        http://www.samy-kantari.fr/
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );


/**
 * DEFINES
 */
define( 'SHUT_UP_AND_SANITIZE_FILENAMES'          , '1.0.0' );
define( 'SHUT_UP_AND_SANITIZE_FILENAMES_FILE'     , __FILE__ );
define( 'SHUT_UP_AND_SANITIZE_FILENAMES_PATH'     , realpath( plugin_dir_path( SHUT_UP_AND_SANITIZE_FILENAMES_FILE ) ) . '/' );
define( 'SHUT_UP_AND_SANITIZE_FILENAMES_INCLUDES' , realpath( SHUT_UP_AND_SANITIZE_FILENAMES_PATH . 'includes/' ) . '/' );


if ( ! class_exists( 'Shut_Up_And_Sanitize_Filenames' ) ) :

    class Shut_Up_And_Sanitize_Filenames {
        protected $plugin_name;
        protected $version;

        protected static $instance = null;

        public function __construct() {

            $this->plugin_name = 'shut-up-and-sanitize-filenames';
            $this->version     = SHUT_UP_AND_SANITIZE_FILENAMES;

            $this->start();
        }

        public function start() {
            add_filter('wp_handle_upload_prefilter', array($this, 'upload_filter') );
        }


        public function upload_filter( $file ){
            $path = pathinfo($file['name']);
            $tmp  = preg_replace('/.' . $path['extension'] . '$/', '', $file['name']); // Remove extension from filename
            $tmp  = sanitize_title($tmp); // Remove accents && Lower case && Remove special characters

            $tmp  = $tmp . '.' . $path['extension'];

            $new_filename = $tmp;

            $file['name'] = $new_filename;
            return $file;
        }


        public static function get_instance() {

            if ( null == self::$instance ) {
                self::$instance = new self;
            }

            return self::$instance;
        }
    }

    Shut_Up_And_Sanitize_Filenames::get_instance();

endif;