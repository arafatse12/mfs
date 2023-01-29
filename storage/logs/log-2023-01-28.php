<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-28 22:17:04 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-01-28 22:17:35 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-01-28 22:17:45 --> Severity: error --> Exception: Call to a member function num_rows() on null D:\laragon\www\mfs\application\controllers\Home.php 195
ERROR - 2023-01-28 22:43:03 --> 404 Page Not Found: Assets/js
ERROR - 2023-01-28 22:43:08 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-01-28 22:43:11 --> 404 Page Not Found: Assets/js
ERROR - 2023-01-28 22:44:08 --> 404 Page Not Found: Assets/js
ERROR - 2023-01-28 22:44:18 --> 404 Page Not Found: Assets/js
ERROR - 2023-01-28 23:50:00 --> 404 Page Not Found: Ckeditorjs/index
ERROR - 2023-01-28 23:52:14 --> 404 Page Not Found: Ckeditorjs/index
ERROR - 2023-01-28 23:52:31 --> 404 Page Not Found: Ckeditorjs/index
ERROR - 2023-01-28 23:53:44 --> 404 Page Not Found: Ckeditorjs/index
