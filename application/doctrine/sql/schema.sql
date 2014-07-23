CREATE TABLE basket (id VARCHAR(36), session_id VARCHAR(64), PRIMARY KEY(id));
CREATE TABLE basket_product (id VARCHAR(36), basket_id VARCHAR(36), product_id VARCHAR(36), unit_id VARCHAR(36), quantity INTEGER, PRIMARY KEY(id));
CREATE TABLE product (id VARCHAR(36), name TEXT, catalog_price DECIMAL(10,2), unit_id VARCHAR(36), PRIMARY KEY(id));
CREATE TABLE unit (id VARCHAR(36), name TEXT, symbol TEXT, PRIMARY KEY(id));
CREATE TABLE unit_conversion (id VARCHAR(36), from_id VARCHAR(36), to_id VARCHAR(36), factor DOUBLE, PRIMARY KEY(id));
