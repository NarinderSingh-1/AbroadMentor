ALTER TABLE `mydb`.`organisations` 
CHANGE COLUMN `parent_trading_name` `parent_trading_name` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `previous_trading_name` `previous_trading_name` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `address` `address` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `town` `town` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `zipcode` `zipcode` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `phone` `phone` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `secondary_website` `secondary_website` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `value_statement` `value_statement` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `about_us` `about_us` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `logo_url` `logo_url` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `url` `url` VARCHAR(255) NULL DEFAULT NULL ,
ADD COLUMN `state` VARCHAR(255) NULL AFTER `town`;

ALTER TABLE `mydb`.`organisations` 
ADD COLUMN `office_type_id` INT(11) NULL AFTER `user_id`;

ALTER TABLE `mydb`.`user_metas` 
ADD COLUMN `alternative_mobile` VARCHAR(45) NULL AFTER `alternative_email`;

ALTER TABLE `mydb`.`branches` 
ADD COLUMN `from_day` TINYINT(1) NULL AFTER `updated_at`,
ADD COLUMN `to_day` TINYINT(1) NULL AFTER `from_day`,
ADD COLUMN `from_time` VARCHAR(45) NULL AFTER `to_day`,
ADD COLUMN `to_time` VARCHAR(45) NULL AFTER `from_time`;

ALTER TABLE `mydb`.`events` 
CHANGE COLUMN `date` `date` DATE NULL DEFAULT NULL ;
