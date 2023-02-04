<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-04 09:02:18 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 09:07:29 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 09:13:40 --> 404 Page Not Found: user/Dashboard/userupdatepassword
ERROR - 2023-02-04 09:55:31 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 09:56:30 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-02-04 09:56:43 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 09:58:13 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 10:11:09 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 10:20:02 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 10:21:57 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 10:22:29 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 10:22:46 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 10:22:49 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 10:39:47 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 10:39:57 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 10:40:20 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 10:43:37 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 11:00:14 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 11:54:17 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-02-04 12:37:09 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:38:43 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:39:52 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:40:11 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:40:33 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:40:48 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:43:57 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:44:30 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:47:10 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:47:22 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:48:02 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:49:43 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:49:59 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 12:50:46 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 13:00:05 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 13:02:48 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-04 17:43:11 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-02-04 18:31:53 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-02-04 19:00:09 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-02-04 19:26:08 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-02-04 19:26:12 --> 404 Page Not Found: Uploads/services
ERROR - 2023-02-04 19:27:01 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-02-04 19:27:02 --> 404 Page Not Found: Uploads/services
