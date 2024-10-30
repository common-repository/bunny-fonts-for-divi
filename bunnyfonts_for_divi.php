<?php
/**
 * Plugin Name: BunnyFonts für Divi
 * Description: Ersetzt Google Fonts durch Bunny Fonts, wenn die Verwendung von Google Fonts in den Divi Theme-Optionen aktiviert ist, um den DSGVO-Bestimmungen zu entsprechen.
 * Version: 1.0.5
 * Author: Saskia Teichmann
 * Author URI: https://www.saskialund.de
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bunnyfonts-for-divi
 * Tested up to: 6.6.9
 * Requires PHP: 7.4
 * Contributors: Jyria
 */

// Beendet die Ausführung des Skripts, wenn ABSPATH nicht definiert ist.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Replace Google Fonts source with Bunny Fonts
 */
function bffd_swap_googlefonts_for_bunnyfonts() {
    // Check if ET_CORE_VERSION is defined
    if ( defined( 'ET_CORE_VERSION' ) ) {
        // Add filter to replace Google Fonts URL with Bunny Fonts URL.
        add_filter( 'et_builder_google_fonts_get_url', function( $url ) {
            // Replace Google Fonts URL with Bunny Fonts URL.
            $url = str_replace( 'https://fonts.googleapis.com/css', 'https://fonts.bunny.net/css', $url );
            // Ensure the URL is safe.
            return esc_url( $url );
        } );
    }
}
// Add action to swap Google Fonts with Bunny Fonts after theme setup.
add_action( 'after_setup_theme', 'bffd_swap_googlefonts_for_bunnyfonts', 99 );
