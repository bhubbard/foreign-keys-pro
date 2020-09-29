<?php
/**
 * Foreign Keys Pro.
 *
 * @package foreign-keys-pro
 */

/*
 * Plugin Name: Foreign Keys Pro
 * Plugin URI: https://hubbardlabs.com
 * Description: A plugin to setup Foreign Keys in the WordPress Database.
 * Text Domain: foreign-keys-pro
 * Author: Hubbard Labs
 * Author URI: https://hubbardlabs.com
 * Contributors: bhubbard
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 * Version: 1.0.0
 */


function fkp_myisam_check() {
  global $wpdb;
  $myisam_tables = intval( $wpdb->query(  "SHOW TABLE STATUS WHERE Engine = 'MyISAM'") );

  if( 0 === $myisam_tables ) {
    return false;
  } else {
    return true;
  }

}


function fkp_add_contstraints( $args = array() ) {

  global $wpdb;

  // Default WordPress.
  $sql = "ALTER TABLE $wpbd->usermeta ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `wp_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql);

  $sql2 = "ALTER TABLE $wpdb->postmeta ADD CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `wp_posts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql2);

  $sql3 = "ALTER TABLE `wp_commentmeta` ADD CONSTRAINT `fk_comment_id` FOREIGN KEY (`comment_id`) REFERENCES `wp_comments` (`comment_ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql3);

  $sql4 = "ALTER TABLE `wp_termmeta` ADD CONSTRAINT `fk_term_id` FOREIGN KEY (`term_id`) REFERENCES `wp_terms` (`term_id`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql4);

  // WooCommerce.

  $sql5 = "ALTER TABLE `wp_woocommerce_order_itemmeta` ADD CONSTRAINT `fk_order_item_id` FOREIGN KEY (`order_item_id`) REFERENCES `wp_woocommerce_order_items` (`order_item_id`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql5);

  $sql6 = "ALTER TABLE `wp_woocommerce_payment_tokenmeta` ADD CONSTRAINT `fk_payment_token_id` FOREIGN KEY (`payment_token_id`) REFERENCES `wp_woocommerce_payment_tokens` (`token_id`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql6);

  $sql7 = "ALTER TABLE `wp_woocommerce_order_items` ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `wp_posts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql7);


  // Stream.
  $sql8 = "ALTER TABLE `wp_og6o50l3ph_stream_meta` ADD CONSTRAINT `fk_record_id` FOREIGN KEY (`record_id`) REFERENCES `wp_og6o50l3ph_stream` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql8);

  // Gravity Forms.
  $sql9 = "ALTER TABLE `wp_og6o50l3ph_gf_form_meta` ADD CONSTRAINT `fk_form_id` FOREIGN KEY (`form_id`) REFERENCES `wp_og6o50l3ph_gf_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql9);

  $sql10 = "ALTER TABLE `wp_og6o50l3ph_gf_form_revisions` ADD CONSTRAINT `fk_form_id` FOREIGN KEY (`form_id`) REFERENCES `wp_og6o50l3ph_gf_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql10);

  $sql11 = "ALTER TABLE `wp_og6o50l3ph_gf_form_view` ADD CONSTRAINT `fk_form_id` FOREIGN KEY (`form_id`) REFERENCES `wp_og6o50l3ph_gf_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql11);

  $sql12 = "ALTER TABLE `wp_og6o50l3ph_gf_addon_feed` ADD CONSTRAINT `fk_form_id` FOREIGN KEY (`form_id`) REFERENCES `wp_og6o50l3ph_gf_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql12);

}
