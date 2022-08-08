ALTER TABLE `Transactions`
MODIFY COLUMN `balance_change` DECIMAL(10,2) not null DEFAULT 0.0;