<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-01-30 09:45:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '= 1)' at line 7 - Invalid query: SELECT `proposals`.*, `users`.`first_name`, `users`.`last_name`, `event_name`, `users`.`country`, `users`.`university`, `users`.`email`, concat(assigned_cms.first_name, " ", assigned_cms.last_name)  as assigned_cm_name
FROM `proposals`
LEFT JOIN `events` ON `events`.`event_id`=`proposals`.`event_id`
LEFT JOIN `users` ON `users`.`user_id`=`proposals`.`proposer_id`
LEFT JOIN `users` as `assigned_cms` ON `assigned_cms`.`user_id`=`proposals`.`assigned_cm`
WHERE `proposals`.`status` = 3
AND `proposals`.`event_id` in (select event_id from events enabled = 1)
ERROR - 2020-01-30 09:45:00 --> Severity: error --> Exception: Call to a member function result() on boolean /home/qsglobalevents/public_html/pss/admin/application/modules/dash_proposals/controllers/Dash_proposals.php 31
ERROR - 2020-01-30 10:41:14 --> Could not find the language line "email"
ERROR - 2020-01-30 10:41:14 --> Could not find the language line "password"
ERROR - 2020-01-30 11:11:00 --> Could not find the language line "email"
ERROR - 2020-01-30 11:11:00 --> Could not find the language line "password"
ERROR - 2020-01-30 11:11:04 --> Could not find the language line "email"
ERROR - 2020-01-30 11:11:04 --> Could not find the language line "password"
ERROR - 2020-01-30 12:47:41 --> Could not find the language line "email"
ERROR - 2020-01-30 12:47:41 --> Could not find the language line "password"
ERROR - 2020-01-30 12:47:44 --> Could not find the language line "email"
ERROR - 2020-01-30 12:47:44 --> Could not find the language line "password"
ERROR - 2020-01-30 16:14:18 --> Could not find the language line "email"
ERROR - 2020-01-30 16:14:18 --> Could not find the language line "password"
ERROR - 2020-01-30 16:14:21 --> Could not find the language line "email"
ERROR - 2020-01-30 16:14:21 --> Could not find the language line "password"
ERROR - 2020-01-30 16:34:21 --> Could not find the language line "email"
ERROR - 2020-01-30 16:34:21 --> Could not find the language line "password"
