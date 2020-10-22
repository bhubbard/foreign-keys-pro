<?php

  // Stream.
  $sql8 = "ALTER TABLE `wp_stream_meta` ADD CONSTRAINT `fk_record_id` FOREIGN KEY (`record_id`) REFERENCES `wp_stream` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  $wpdb->query($sql8);
