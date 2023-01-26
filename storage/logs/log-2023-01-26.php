<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-26 22:13:44 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:21:28 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:25:00 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:28:10 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:30:23 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:45:36 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:45:39 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:46:15 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:46:37 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:48:01 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:49:42 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 22:50:14 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:15:38 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:16:59 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:17:50 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:18:01 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:19:02 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:19:16 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:32:24 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:33:19 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:34:38 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:35:59 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:36:18 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:36:43 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:38:40 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:39:11 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-01-26 23:41:32 --> 404 Page Not Found: Uploads/profile_img
ERROR - 2023-01-26 23:41:46 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:42:16 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:42:29 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:43:01 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:43:21 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:43:47 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:44:04 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:44:19 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:44:47 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:47:21 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:47:58 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:50:16 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:50:48 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:52:19 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:53:53 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:53:54 --> Severity: error --> Exception: syntax error, unexpected '}', expecting end of file D:\laragon\www\mfs\application\views\user\service_preview\index.php 1343
ERROR - 2023-01-26 23:54:54 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:54:57 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:55:44 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:55:57 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:56:58 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:57:42 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:57:56 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-26 23:58:23 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
