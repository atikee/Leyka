<?php
/**
 * @package Leyka
 * @subpackage Settings -> Gateways tab modifications
 * @copyright Copyright (C) 2012-2013 by Teplitsa of Social Technologies (te-st.ru).
 * @author Lev Zvyagintsev aka Ahaenor
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License v2 or later
 * @since 1.0
 */

if( !defined('ABSPATH') ) exit; // Exit if accessed directly

// Add icon option to the icons list:
function leyka_icons($icons){
    // Remove default EDD's Visa and Mastercard icons - they don't satisfy Visa & MC logos Terms Of Use:
    unset($icons['visa'], $icons['mastercard'], $icons['paypal']);

    $icons = array_merge( // To add this icons options in the beginning of the list, not in the end
        array(
            // Visa:
            LEYKA_PLUGIN_BASE_URL.'images/icons/visa_s.png' => __('Visa small (105x35 px)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/visa_m.png' => __('Visa medium (159x51 px) (recommended)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/visa_b.png' => __('Visa big (248x80 px)', 'leyka'),

            // Verified By Visa:
            LEYKA_PLUGIN_BASE_URL.'images/icons/vbv_s.png' => __('Verified By Visa small (61x35 px)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/vbv_m.png' => __('Verified By Visa medium (101x51 px) (recommended)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/vbv_b.png' => __('Verified By Visa big (164x80 px)', 'leyka'),

            // Mastercard:
            LEYKA_PLUGIN_BASE_URL.'images/icons/mc_s.png' => __('Mastercard small (55x35 px)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/mc_m.png' => __('Mastercard medium (82x51 px) (recommended)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/mc_b.png' => __('Mastercard big (127x80 px)', 'leyka'),

            // Mastercard Secure Code:
            LEYKA_PLUGIN_BASE_URL.'images/icons/mc_sc_s.png' => __('Mastercard Secure Code small (64x35 px)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/mc_sc_m.png' => __('Mastercard Secure Code medium (94x51 px) (recommended)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/mc_sc_b.png' => __('Mastercard Secure Code big (150x80 px)', 'leyka'),

            // JCB:
            LEYKA_PLUGIN_BASE_URL.'images/icons/jcb_s.png' => __('JCB small (45x35 px)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/jcb_m.png' => __('JCB medium (65x51 px) (recommended)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/jcb_b.png' => __('JCB big (103x80 px)', 'leyka'),

            // Paypal (EDD integrated):
            LEYKA_PLUGIN_BASE_URL.'images/icons/paypal_s.png' => __('Paypal small (55x35 px)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/paypal_m.png' => __('Paypal medium (81x51 px) (recommended)', 'leyka'),
            LEYKA_PLUGIN_BASE_URL.'images/icons/paypal_b.png' => __('Paypal big (127x80 px)', 'leyka'),
        ),
        $icons
    );

    return $icons;
}
add_filter('edd_accepted_payment_icons', 'leyka_icons');

// Changes in on Settings->Gateways admin section:
function leyka_gateways_options($settings){
    global $edd_options;
    if(empty($edd_options['gateways']['paypal'])) {
        unset(
        $settings['paypal'], $settings['paypal_email'], $settings['paypal_page_style'],
        $settings['paypal_alternate_verification'], $settings['disable_paypal_verification']
        );
    }
    return $settings;
}
add_filter('edd_settings_gateways', 'leyka_gateways_options');