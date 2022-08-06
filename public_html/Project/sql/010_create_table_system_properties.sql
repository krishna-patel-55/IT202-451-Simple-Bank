CREATE TABLE IF NOT EXISTS  `System_Properties`
(
    `id` int auto_increment not null,
    `name` varchar(7) not null,
    `value` DECIMAL(3,2) default 0.0,
    `created` timestamp default current_timestamp,
    `modified` timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`)
)