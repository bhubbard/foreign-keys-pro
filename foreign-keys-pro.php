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

add_action( 'admin_init', 'fkp_add_contstraints');
function fkp_add_contstraints( $args = array() ) {

  global $wpdb;

  $wpdb->show_errors();

  // TOODO Arguements for on delete and on update

  // Default WordPress.
  $sql = "ALTER TABLE $wpbd->usermeta ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES $wpdb->users (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql);

  $sql2 = "ALTER TABLE $wpdb->postmeta ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES $wpdb->posts (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql2);

  $sql3 = "ALTER TABLE $wpdb->commentmeta ADD CONSTRAINT `comment_id` FOREIGN KEY (`comment_id`) REFERENCES $wpdb->comments (`comment_ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql3);

  $sql4 = "ALTER TABLE $wpdb->termmeta ADD CONSTRAINT `term_id` FOREIGN KEY (`term_id`) REFERENCES $wpdb->terms (`term_id`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql4);

  $sql5 = "ALTER TABLE $wpdb->term_relationships ADD CONSTRAINT `term_taxonomy_id` FOREIGN KEY (`term_taxonomy_id`) REFERENCES $wpdb->term_taxonomy (`term_taxonomy_id`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql5);

  $sql6 = "ALTER TABLE $wpdb->term_taxonomy ADD CONSTRAINT `term_id` FOREIGN KEY (`term_id`) REFERENCES $wpdb->terms (`term_id`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql6);

  $sql7 = "ALTER TABLE $wpdb->posts ADD CONSTRAINT `author_id` FOREIGN KEY (`post_author`) REFERENCES $wpdb->users (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql7);

  $sql8 = "ALTER TABLE $wpdb->comments ADD CONSTRAINT `commet_post_id` FOREIGN KEY (`comment_post_ID`) REFERENCES $wpdb->posts (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;";
  $wpdb->query($sql8);


}
