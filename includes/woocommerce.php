<?php

// WooCommerce.
/*
$sql5 = "ALTER TABLE `wp_woocommerce_order_itemmeta` ADD CONSTRAINT `fk_order_item_id` FOREIGN KEY (`order_item_id`) REFERENCES `wp_woocommerce_order_items` (`order_item_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$wpdb->query($sql5);

$sql6 = "ALTER TABLE `wp_woocommerce_payment_tokenmeta` ADD CONSTRAINT `fk_payment_token_id` FOREIGN KEY (`payment_token_id`) REFERENCES `wp_woocommerce_payment_tokens` (`token_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$wpdb->query($sql6);

$sql7 = "ALTER TABLE `wp_woocommerce_order_items` ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `wp_posts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
$wpdb->query($sql7);
