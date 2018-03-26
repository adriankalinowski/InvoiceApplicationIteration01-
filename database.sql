CREATE DATABASE IF NOT EXISTS InvoiceApplication;

CREATE TABLE IF NOT EXISTS Broker
(
	broker_id INTEGER AUTO_INCREMENT,
	company_name VARCHAR(200),
	address VARCHAR(),
	city VARCHAR(),
	state VARCHAR(),
	zip_code INTEGER,
	email VARCHAR(),
	bill_via_email VARCHAR(),
	PRIMARY KEY (broker_id)
);

CREATE TABLE IF NOT EXISTS Invoices
(
	invoice_id INTEGER AUTO_INCREMENT,
	shipped_from_city VARCHAR(),
	shipped_from_state VARCHAR(),
	shipped_to_city VARCHAR(),
	shipped_to_state VARCHAR(),
	amount DOUBLE,
	creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
	PRIMARY KEY (invoice_id)
);

CREATE TABLE IF NOT EXISTS Invoice_Broker
(
	invoice_id INTEGER,
	broker_id INTEGER,
	FOREIGN KEY (invoice_id) REFERENCES Invoices(invoice_id),
	FOREIGN KEY (broker_id) REFERENCES Broker(broker_id)
);