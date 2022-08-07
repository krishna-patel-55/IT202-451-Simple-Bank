ALTER TABLE `Transactions`
MODIFY COLUMN `expected_total` DECIMAL(10,2) not null DEFAULT 0.0;