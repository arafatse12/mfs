<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-24 21:04:06 --> Severity: error --> Exception: syntax error, unexpected '}', expecting end of file D:\laragon\www\mfs\application\views\user\includes\navbar.php 286
ERROR - 2023-01-24 21:09:16 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'truelysell.f.currency_code'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT sum(fee) as paid_amt, `currency_code`
FROM `subscription_details_history` as `s`
JOIN `subscription_fee` as `f` ON `f`.`id`=`s`.`subscription_id`
