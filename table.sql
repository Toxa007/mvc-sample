CREATE TABLE
    `products` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `price` INT(11) NOT NULL,
		`description` TEXT,
        PRIMARY KEY(`id`)
    )