CREATE TABLE IF NOT EXISTS `Transactions` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `account_src` INT NOT NULL, 
    `account_dest` INT NOT NULL,
    `balance_change` INT NOT NULL DEFAULT 0, 
    `transaction_type` VARCHAR(15) NOT NULL,
    `memo` VARCHAR(240) DEFAULT NULL,
    `expected_total` INT NOT NULL DEFAULT 0,
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(account_src) REFERENCES Accounts(id),
    FOREIGN KEY(account_dest) REFERENCES Accounts(id),
    constraint ZeroTransferNotAllowed CHECK (balance_change != 0)
)