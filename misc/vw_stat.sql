
set names utf8;

CREATE OR REPLACE VIEW vw_days AS SELECT distinct date, subacc_id, midlet_id from statistic_download;


CREATE OR REPLACE VIEW vw_stat_subacc_daily AS 
SELECT
	CONCAT(subacc.id, '_', REPLACE(vw_days.date, '-', '')) AS id,
    subacc.id AS subacc_id,
    subacc.profile_id AS profile_id,
    subacc.`key`,
    
    /** Выбираем дату без времени из статистики загрузок */
    vw_days.date AS `dt`,
    
    /** Считаем колличество СМС за день */
    (
        SELECT count(*) 
        FROM statistic_sms 
        WHERE statistic_sms.subacc_id = subacc.id 
            AND statistic_sms.`date` = dt
    ) as sms_count,
    
    /** Вычисляем profit за день */
    (
        SELECT SUM(cost) 
        FROM statistic_sms 
        WHERE statistic_sms.subacc_id = subacc.id 
            AND statistic_sms.`date` = dt
    ) AS profit,
    
    /** Считаем колличество загрузок за день */
    (
        SELECT count(*) 
        FROM statistic_download
        WHERE statistic_download.subacc_id = subacc.id 
            AND statistic_download.`date` = dt
    ) as dl_count
FROM
    subacc
    JOIN vw_days ON vw_days.subacc_id = subacc.id;
    
    
CREATE OR REPLACE VIEW `vw_stat_profile_daily` AS
  SELECT profile_id, dt, sum(sms_count) as sms_count, sum(dl_count) as dl_count, sum(profit) as profit
  FROM vw_stat_subacc_daily group by profile_id, dt;

CREATE OR REPLACE VIEW `vw_stat_midlet_daily` AS select concat(`midlet`.`id`,'_',replace(`vw_days`.`date`,'-','')) AS `id`,`midlet`.`id` AS `midlet_id`,`midlet`.`name` as `name`, `vw_days`.`date` AS `dt`,(select count(0) AS `count(*)`  from `statistic_sms` where ((`statistic_sms`.`midlet_id` = `midlet`.`id`) and (`statistic_sms`.`date` = `dt`))) AS `sms_count`,(select sum(`statistic_sms`.`cost`) AS `SUM(cost)` from `statistic_sms` where ((`statistic_sms`.`midlet_id` = `midlet`.`id`) and (`statistic_sms`.`date` = `dt`))) AS `profit`,(select count(0) AS `count(*)` from `statistic_download` where ((`statistic_download`.`midlet_id` = `midlet`.`id`) and (`statistic_download`.`date` = `dt`))) AS `dl_count` from (`midlet` join `vw_days` on((`vw_days`.`midlet_id` = `midlet`.`id`)))
  
  
  