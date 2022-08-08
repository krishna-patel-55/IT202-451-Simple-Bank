ALTER TABLE `Accounts` 
ADD COLUMN last_apy_calc TIMESTAMP default CURRENT_TIMESTAMP,
ADD COLUMN is_active TINYINT(1) default 1;