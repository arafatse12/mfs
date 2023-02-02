<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-01 21:43:57 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-02-01 21:46:10 --> 404 Page Not Found: admin/Undefined/index
ERROR - 2023-02-01 21:46:12 --> Query error: Column 'subcategory' cannot be null - Invalid query: INSERT INTO `services` (`user_id`, `service_title`, `currency_code`, `service_sub_title`, `category`, `subcategory`, `service_location`, `service_latitude`, `service_longitude`, `service_amount`, `about`, `service_image`, `service_details_image`, `thumb_image`, `mobile_image`, `created_at`, `updated_at`, `status`, `admin_verification`, `service_offered`, `created_by`, `service_country`, `service_state`, `service_city`, `url`) VALUES ('0', 'fdfdf', 'USD', NULL, '12', NULL, ',,', '', '', '33', 'eweew', 'uploads/services/se_full_16752681711.jpg', 'uploads/services/de_full_16752681711.jpg', 'uploads/services/th_full_16752681711.jpg', 'uploads/services/mo_full_16752681711.jpg', '2023-02-01 21:46:12', '2023-02-01 21:46:12', 1, 1, 'null', 'admin', '', '', '', 'fdfdf')
ERROR - 2023-02-01 21:46:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable D:\laragon\www\mfs\application\controllers\admin\Service.php 1024
ERROR - 2023-02-01 21:46:48 --> Query error: Column 'subcategory' cannot be null - Invalid query: INSERT INTO `services` (`user_id`, `service_title`, `currency_code`, `service_sub_title`, `category`, `subcategory`, `service_location`, `service_latitude`, `service_longitude`, `service_amount`, `about`, `service_image`, `service_details_image`, `thumb_image`, `mobile_image`, `created_at`, `updated_at`, `status`, `admin_verification`, `service_offered`, `created_by`, `service_country`, `service_state`, `service_city`, `url`) VALUES ('0', 'aaa', 'USD', NULL, '12', NULL, ',,', '', '', '444', 'dsdds', 'uploads/services/se_full_167526820816743006411660053769service-26.jpg', 'uploads/services/de_full_167526820816743006411660053769service-26.jpg', 'uploads/services/th_full_167526820816743006411660053769service-26.jpg', 'uploads/services/mo_full_167526820816743006411660053769service-26.jpg', '2023-02-01 21:46:48', '2023-02-01 21:46:48', 1, 1, 'null', 'admin', '', '', '', 'aaa')
ERROR - 2023-02-01 21:46:48 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable D:\laragon\www\mfs\application\controllers\admin\Service.php 1024
ERROR - 2023-02-01 21:48:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable D:\laragon\www\mfs\application\controllers\admin\Service.php 1024
ERROR - 2023-02-01 21:50:43 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable D:\laragon\www\mfs\application\controllers\admin\Service.php 1024
ERROR - 2023-02-01 22:19:39 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
ERROR - 2023-02-01 22:19:46 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-01 23:12:10 --> Query error: Expression #10 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'truelysell.r.rating' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `s`.`id`, `s`.`user_id`, `s`.`service_location`, `s`.`service_title`, `s`.`service_amount`, `s`.`mobile_image`, `s`.`about`, `c`.`category_name`, `c`.`category_image`, `r`.`rating`, `sc`.`subcategory_name`, `s`.`currency_code`, `s`.`url`
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
ERROR - 2023-02-01 23:40:13 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-01 23:43:56 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-01 23:44:38 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-01 23:45:15 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-01 23:45:30 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\laragon\www\mfs\application\views\user\home\user_sidemenu.php 22
ERROR - 2023-02-01 23:46:04 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-01 23:51:25 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-01 23:54:32 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-01 23:54:46 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-01 23:55:09 --> 404 Page Not Found: Assets/js
