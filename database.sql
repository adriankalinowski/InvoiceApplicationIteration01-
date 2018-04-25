CREATE DATABASE IF NOT EXISTS InvoiceApplication;

CREATE TABLE IF NOT EXISTS broker
(
	broker_id INTEGER AUTO_INCREMENT,
	company_name VARCHAR(200),
	address VARCHAR(256),
	city VARCHAR(256),
	state VARCHAR(2),
	zip_code INTEGER,
	email VARCHAR(256),
	bill_via_email BOOLEAN,
	PRIMARY KEY (broker_id)
);

CREATE TABLE IF NOT EXISTS invoices
(
	invoice_id INTEGER AUTO_INCREMENT,
	shipped_from_city VARCHAR(256),
	shipped_from_state VARCHAR(256),
	shipped_to_city VARCHAR(256),
	shipped_to_state VARCHAR(256),
	amount DOUBLE,
	creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (invoice_id)
);

CREATE TABLE IF NOT EXISTS invoice_broker
(
	invoice_id INTEGER,
	broker_id INTEGER,
	FOREIGN KEY (invoice_id) REFERENCES Invoices(invoice_id),
	FOREIGN KEY (broker_id) REFERENCES Broker(broker_id)
);