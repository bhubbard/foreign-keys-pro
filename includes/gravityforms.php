<?php

// Gravity Forms.
$sql9 = "ALTER TABLE `wp_gf_form_meta` ADD CONSTRAINT `fk_form_id` FOREIGN KEY (`form_id`) REFERENCES `wp_gf_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE";
$wpdb->query($sql9);

$sql10 = "ALTER TABLE `wp_gf_form_revisions` ADD CONSTRAINT `fk_form_id` FOREIGN KEY (`form_id`) REFERENCES `wp_gf_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE";
$wpdb->query($sql10);

$sql11 = "ALTER TABLE `wp_gf_form_view` ADD CONSTRAINT `fk_form_id` FOREIGN KEY (`form_id`) REFERENCES `wp_gf_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE";
$wpdb->query($sql11);

$sql12 = "ALTER TABLE `wp_gf_addon_feed` ADD CONSTRAINT `fk_form_id` FOREIGN KEY (`form_id`) REFERENCES `wp_gf_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE";
$wpdb->query($sql12);
