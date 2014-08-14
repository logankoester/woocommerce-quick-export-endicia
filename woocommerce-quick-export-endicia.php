<?php
/*
Plugin Name: WooCommerce Quick Export Endicia
Version: 1.0
Description: Add-on for "WooCommerce Quick Export Plugin" to export your WooCommerce orders in an Endicia-compatbile CSV format
Author: Logan Koester <logan@logankoester.com>
Author URI: http://logankoester.com
Plugin URI: https://github.com/logankoester/woocommerce-quick-export-endicia
Text Domain: woocommerce-quick-export-endicia
Domain Path: /languages
*/

function wqep_endicia_included_order_keys($keys) {
  $whitelisted_keys = array(
    'shipping_complete_name',
    'shipping_company',
    'shipping_address_1',
    'shipping_address_2',
    'shipping_city',
    'shipping_state',
    'shipping_postcode',
    'shipping_country'
  );
  return $whitelisted_keys;
}

function wqep_endicia_add_complete_name($keys) {
  array_push($keys, 'shipping_complete_name');
  return $keys;
}

function wqep_endicia_no_product_keys($keys) {
  return array();
}

add_filter('wqep_included_order_keys_filter', 'wqep_endicia_add_complete_name');
add_filter('wqep_included_order_keys_filter', 'wqep_endicia_included_order_keys');
add_filter('wqep_included_order_default_product_keys_filter', 'wqep_endicia_no_product_keys');

?>
