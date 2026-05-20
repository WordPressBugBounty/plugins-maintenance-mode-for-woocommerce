<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( !class_exists( 'Nf_Maintenance_i18n' ) ) {

    class Nf_Maintenance_i18n {

    	public function load_plugin_textdomain() {

            $domain = 'maintenance-mode-for-woocommerce';
            $locale = determine_locale();
            $mofile = $domain . '-' . $locale . '.mo';

            // 1. Priority: Local translations (Plugin folder)
            // Use dirname( plugin_dir_path( __FILE__ ) ) to get the root of the plugin
            $local_path = path_join( dirname( plugin_dir_path( __FILE__ ) ), 'languages/' . $mofile );

            if ( file_exists( $local_path ) ) {
                load_textdomain( $domain, $local_path );
            }

            // 2. Fallback: Global WordPress translations (wp-content/languages/plugins/)
            $global_path = path_join( WP_LANG_DIR, 'plugins/' . $mofile );

            if ( file_exists( $global_path ) ) {
                load_textdomain( $domain, $global_path );
            }

    	}

    }

}