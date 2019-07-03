CREATE DATABASE IF NOT EXISTS db_surtido_r
CHARACTER SET UTF8
COLLATE utf8_unicode_ci;

USE db_surtido_r;

CREATE TABLE IF NOT EXISTS categories(
	id_category INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	category_name VARCHAR(100) UNIQUE NOT NULL COMMENT 'Must be UNIQUE to avoid confusion',
	category_image VARCHAR(255) NULL COMMENT 'If pictures for categories will be used',
	category_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) COMMENT='Table used to store product categories';

CREATE TABLE IF NOT EXISTS regions(
	id_region INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	region_name VARCHAR(100) UNIQUE NOT NULL COMMENT 'Must be UNIQUE to avoid confusion',
	region_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) COMMENT='Table used to store regions(cities)';

INSERT INTO regions(region_name) VALUES('Ciudad Juárez');

CREATE TABLE IF NOT EXISTS stores(
	id_store INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	store_name VARCHAR(100) UNIQUE NOT NULL COMMENT 'Must be UNIQUE to avoid confusion',
	street_address VARCHAR(300) NULL,
	belongs_to_region INT UNSIGNED NOT NULL COMMENT 'Foreign key to categories table',
	store_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT store_belongs_to_region FOREIGN KEY(belongs_to_region) REFERENCES regions(id_region) ON UPDATE CASCADE ON DELETE RESTRICT
) COMMENT='Table used to store distinct stores';

CREATE TABLE IF NOT EXISTS products(
	id_product INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	code VARCHAR(100) NULL UNIQUE COMMENT 'Manual input',
	product_name VARCHAR(100),
	wholesale_price DECIMAL(7,2) NULL,
	retail_price DECIMAL(7,2) NULL,
	belongs_to_category INT UNSIGNED NOT NULL COMMENT 'Foreign key to categories table',
	belongs_to_store INT UNSIGNED NOT NULL COMMENT 'Foreign key to stores table',
	product_image VARCHAR(100) NULL COMMENT 'If product will need image',
	is_active BOOLEAN NOT NULL DEFAULT TRUE,
	CONSTRAINT product_belongs_to_category FOREIGN KEY(belongs_to_category) REFERENCES categories(id_category) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT product_belongs_to_store FOREIGN KEY(belongs_to_store) REFERENCES stores(id_store) ON UPDATE CASCADE ON DELETE RESTRICT
) COMMENT='Table used to store products';

CREATE TABLE IF NOT EXISTS users(
	id_user INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	employee_id VARCHAR(100) UNIQUE COMMENT 'Manual input',
	name VARCHAR(100) NOT NULL,
	lastname VARCHAR(100),
	email VARCHAR(100) UNIQUE,
	nickname VARCHAR(100) UNIQUE NOT NULL,
	user_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

/* Roles tables will be added using Entrust Laravel migrations */
/* Jobs tables will be added using Laravel migrations */
/* Necessary tables will be added during developing */






