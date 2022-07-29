ALTER TABLE Users 
ADD COLUMN firstname varchar(30) not null default (username),
ADD COLUMN lastname varchar(30) default NULL;