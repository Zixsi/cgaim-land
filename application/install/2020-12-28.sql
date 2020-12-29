CREATE TABLE `subscription` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(100) NOT NULL , 
    `phone` VARCHAR(20) NOT NULL , 
    `title` VARCHAR(120) NULL , 
    `comment` VARCHAR(255) NULL , 
    `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`),
    INDEX (`date`)
) ENGINE = InnoDB;