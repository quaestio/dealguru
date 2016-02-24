ALTER TABLE `countries` CHANGE `address_format_id` `is_active` VARCHAR( 1 ) NOT NULL DEFAULT 'Y';
update  `countries` set is_active='Y';