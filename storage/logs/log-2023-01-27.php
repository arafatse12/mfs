<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-27 00:00:21 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:01:57 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:02:18 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:02:33 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:02:44 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:03:04 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:03:05 --> Severity: error --> Exception: syntax error, unexpected '}', expecting end of file D:\laragon\www\mfs\application\views\user\service_preview\index.php 1331
ERROR - 2023-01-27 00:03:28 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:04:19 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:04:20 --> Severity: error --> Exception: syntax error, unexpected end of file D:\laragon\www\mfs\application\views\user\service_preview\index.php 1473
ERROR - 2023-01-27 00:04:46 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:09:41 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:09:42 --> Severity: error --> Exception: syntax error, unexpected '<', expecting end of file D:\laragon\www\mfs\application\views\user\service_preview\index.php 1273
ERROR - 2023-01-27 00:10:15 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:12:06 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:15:58 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:16:41 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:18:54 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-01-27 00:22:13 --> 404 Page Not Found: Uploads/profile_img
ERROR - 2023-01-27 00:22:50 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.SP.sub_id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `SP`.*, `U`.`name`, `S`.`subscription_name`, `SD`.`expiry_date_time`, `SD`.`paid_status`, `SD`.`id` as `subscription_details_id`
FROM `subscription_payment` `SP`
LEFT JOIN `subscription_details` `SD` ON `SD`.`subscription_id`=`SP`.`subscription_id`
LEFT JOIN `subscription_fee` `S` ON `S`.`id`=`SP`.`subscription_id`
LEFT JOIN `providers` `U` ON `U`.`id`=`SP`.`subscriber_id`
WHERE `SP`.`tokenid` = 'Offline Payment'
GROUP BY `SP`.`id`
ORDER BY `SP`.`id` DESC
ERROR - 2023-01-27 00:22:50 --> Severity: error --> Exception: Call to a member function result_array() on bool D:\laragon\www\mfs\application\models\Admin_model.php 1141
ERROR - 2023-01-27 00:23:16 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-01-27 00:23:21 --> Query error: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.SP.sub_id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `SP`.*, `U`.`name`, `S`.`subscription_name`, `SD`.`expiry_date_time`, `SD`.`paid_status`, `SD`.`id` as `subscription_details_id`
FROM `subscription_payment` `SP`
LEFT JOIN `subscription_details` `SD` ON `SD`.`subscription_id`=`SP`.`subscription_id`
LEFT JOIN `subscription_fee` `S` ON `S`.`id`=`SP`.`subscription_id`
LEFT JOIN `providers` `U` ON `U`.`id`=`SP`.`subscriber_id`
WHERE `SP`.`tokenid` = 'Offline Payment'
GROUP BY `SP`.`id`
ORDER BY `SP`.`id` DESC
ERROR - 2023-01-27 00:23:21 --> Severity: error --> Exception: Call to a member function result_array() on bool D:\laragon\www\mfs\application\models\Admin_model.php 1141
ERROR - 2023-01-27 00:24:59 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-01-27 00:25:42 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-01-27 00:25:55 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:26:23 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:26:37 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:28:45 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:33:52 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:34:06 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:34:50 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:34:58 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:35:18 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:35:55 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:37:00 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:37:02 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:40:25 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:40:26 --> Severity: error --> Exception: syntax error, unexpected end of file D:\laragon\www\mfs\application\views\user\service_preview\index.php 1484
ERROR - 2023-01-27 00:40:40 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:40:40 --> Severity: error --> Exception: syntax error, unexpected end of file D:\laragon\www\mfs\application\views\user\service_preview\index.php 1484
ERROR - 2023-01-27 00:42:35 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:43:15 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:43:17 --> Severity: error --> Exception: syntax error, unexpected end of file D:\laragon\www\mfs\application\views\user\service_preview\index.php 1483
ERROR - 2023-01-27 00:43:38 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:43:38 --> Severity: error --> Exception: syntax error, unexpected end of file D:\laragon\www\mfs\application\views\user\service_preview\index.php 1483
ERROR - 2023-01-27 00:44:02 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:44:43 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:45:18 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:45:46 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:46:08 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:54:29 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:54:29 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:55:43 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:55:47 --> Severity: error --> Exception: syntax error, unexpected end of file D:\laragon\www\mfs\application\views\user\service_preview\index.php 1482
ERROR - 2023-01-27 00:56:35 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:56:37 --> Severity: error --> Exception: syntax error, unexpected end of file D:\laragon\www\mfs\application\views\user\service_preview\index.php 1483
ERROR - 2023-01-27 00:58:45 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 00:59:15 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 01:00:14 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
ERROR - 2023-01-27 01:01:00 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
FROM `services` `s`
LEFT JOIN `categories` `c` ON `c`.`id` = `s`.`category`
LEFT JOIN `subcategories` `sc` ON `sc`.`id` = `s`.`subcategory`
LEFT JOIN `rating_review` `r` ON `r`.`service_id` = `s`.`id`
JOIN `subscription_details` as `sd` ON `sd`.`subscriber_id`=`s`.`user_id`
WHERE `s`.`status` = 1
AND `s`.`status` = 1
GROUP BY `s`.`id`
ORDER BY `s`.`total_views` DESC
 LIMIT 10
