CREATE TABLE tenants (
    tenant_id mediumint(8) unsigned NOT NULL auto_increment,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    apartment_address VARCHAR(255),
    phone VARCHAR(255),
    -- the ID of the landlord and apartment, which will be in another table
    landlord_id mediumint(8) unsigned,
    apartment_id mediumint(8) unsigned,
    -- DATE format: YYYY-MM-DD
    lease_start DATE,
    lease_end DATE,
    next_payment DATE,
    -- DECIMAL(max_size, precision)
    payment_amount DECIMAL(15, 2),
    PRIMARY KEY (tenant_id)
) AUTO_INCREMENT=1;
-- Test insertion
INSERT INTO tenants (first_name, last_name, email, apartment_address, phone, landlord_id, apartment_id, lease_start, lease_end, next_payment, payment_amount)
VALUES ("Jerry", "Guerrero", "gerardo.guerrero02@utrgv.edu", "1234 Fake Avenue", "555-555-5555", 01234567, 12345678, "2018-09-11", "2018-12-11", "2018-10-11", 900.00) 