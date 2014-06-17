CREATE TABLE product (id INTEGER UNSIGNED, name TEXT, catalog_price DECIMAL(10,2), PRIMARY KEY(id));
CREATE TABLE product_price_rule (id INTEGER UNSIGNED, product_id INTEGER NOT NULL, price_type VARCHAR(255), PRIMARY KEY(id));
CREATE TABLE product_price_rule_factor (id INTEGER UNSIGNED, product_id INTEGER NOT NULL, price_type VARCHAR(255), factor DOUBLE, PRIMARY KEY(id));
