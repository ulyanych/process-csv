CREATE TABLE `hotels` ( 
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `hotel_id` BIGINT UNSIGNED NOT NULL , 
    `hotel_name` VARCHAR(255) NOT NULL , 
    `room_name` VARCHAR(255) NOT NULL , 
    `state` VARCHAR(20) NULL , 
    `price` DECIMAL(10,2) NOT NULL , 
    `currency` CHAR(3) NOT NULL DEFAULT 'RUB' , 
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;