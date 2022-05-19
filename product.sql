CREATE TABLE `category` (
    `product_id` int(10) UNSIGNED NOT NULL,
    `category_id` int(10) NOT NULL,
    `category_name` varchar(100) NOT NULL,
    `category_value` varchar(10) NOT NULL,
    PRIMARY KEY (product_id)
);

CREATE TABLE `products` (
    `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `category_id` int(10)  NOT NULL,
    `product_sku` varchar(100),
    `product_name` varchar(100),
    `product_price` int(10),
    PRIMARY KEY (product_id)
);

ALTER TABLE
    `category`
ADD
    FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

INSERT INTO
    `products` (product_sku, product_name, category_id, product_price)
VALUES
    ("JK00013", "DVD", 1, 300),
    ("JK00014", "DVD 2", 2, 300),
    ("JK00012", "DVD", 1, 300),
    ("JK00012", "DVD 2", 2, 300),
    ("JK00011", "DVD", 1, 300);

INSERT INTO
    `category` (category_name, category_value, product_id, category_id)
VALUES
    ("Size", 300, 1, 1),
    ("Size", 300, 2, 1),
    ("Size", 300, 3, 1);