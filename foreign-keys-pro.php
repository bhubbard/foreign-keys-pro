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


if( ! class_exists( 'ForeignKeysPro' ) ) {

	/**
	 * Foreign Keys Pro.
	 */
	class ForeignKeysPro {

		/**
		 * [__construct description]
		 */
		public function __construct() {

		}

		/**
		 * [check_for_myisam description]
		 * @return [type] [description]
		 */
		public function check_for_myisam() {

			global $wpdb;
			$myisam_tables = intval( $wpdb->query(  "SHOW TABLE STATUS WHERE Engine = 'MyISAM'") );

			if( 0 === $myisam_tables ) {
				return false;
			} else {
				return true;
			}

		}

		/**
		 * [foreign_key_usermeta description]
		 * @param  array  $args [description]
		 * @return [type]       [description]
		 */
		public function foreign_key_usermeta( $args = array() ) {

			global $wpdb;

			$query = "ALTER TABLE $wpbd->usermeta ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES $wpdb->users (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
		  $results = $wpdb->query( $query ) ?? false;

			return $results;

		}

		public function foreign_key_postmeta( $args = array() ) {

			global $wpdb;

			$query = "ALTER TABLE $wpdb->postmeta ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES $wpdb->posts (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
			$results = $wpdb->query( $query ) ?? false;

			return $results;

		}

		public function foreign_key_commentmeta( $args = array() ) {

			global $wpdb;

			$query = "ALTER TABLE $wpdb->commentmeta ADD CONSTRAINT `comment_id` FOREIGN KEY (`comment_id`) REFERENCES $wpdb->comments (`comment_ID`) ON DELETE CASCADE ON UPDATE CASCADE";
			$results = $wpdb->query( $query ) ?? false;

			return $results;

		}

		public function foregin_key_termmeta( $args = array() ) {

			global $wpdb;

			$query = "ALTER TABLE $wpdb->termmeta ADD CONSTRAINT `term_id` FOREIGN KEY (`term_id`) REFERENCES $wpdb->terms (`term_id`) ON DELETE CASCADE ON UPDATE CASCADE";
			$results = $wpdb->query( $query ) ?? false;

			return $results;

		}

		public function foregin_key_term_relationships( $args = array() ) {

			global $wpdb;

			$query = "ALTER TABLE $wpdb->term_relationships ADD CONSTRAINT `term_taxonomy_id` FOREIGN KEY (`term_taxonomy_id`) REFERENCES $wpdb->term_taxonomy (`term_taxonomy_id`) ON DELETE CASCADE ON UPDATE CASCADE";
			$results = $wpdb->query( $query ) ?? false;

			return $results;

		}

		public function foregin_key_term_taxonomy( $args = array() ) {

			global $wpdb;

			$query = "ALTER TABLE $wpdb->term_taxonomy ADD CONSTRAINT `term_id` FOREIGN KEY (`term_id`) REFERENCES $wpdb->terms (`term_id`) ON DELETE CASCADE ON UPDATE CASCADE";
			$results = $wpdb->query( $query ) ?? false;

			return $results;

		}

		public function foregin_key_posts( $args = array() ) {

			global $wpdb;

			$query = "ALTER TABLE $wpdb->posts ADD CONSTRAINT `author_id` FOREIGN KEY (`post_author`) REFERENCES $wpdb->users (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
			$results = $wpdb->query( $query ) ?? false;

			return $results;

		}

		public function foreign_keys_comments( $args = array() ) {

				global $wpdb;

				$query = "ALTER TABLE $wpdb->comments ADD CONSTRAINT `commet_post_id` FOREIGN KEY (`comment_post_ID`) REFERENCES $wpdb->posts (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
				$results = $wpdb->query( $query ) ?? false;

				return $results;

		}

}
