CREATE DATABASE IF NOT EXISTS InvoiceApplication;

CREATE TABLE IF NOT EXISTS Broker
(
	company_name VARCHAR(200),
	address VARCHAR(),
	city VARCHAR(),
	state VARCHAR(),
	zip_code INTEGER,
	email VARCHAR(),
	bill_via_email VARCHAR(),
	PRIMARY KEY (company_name)
);

CREATE TABLE IF NOT EXISTS Invoices
(
	invoiceId INTEGER AUTO_INCREMENT,
	shipped_from_city VARCHAR(),
	shipped_from_state VARCHAR(),
	shipped_to_city VARCHAR(),
	shipped_to_state VARCHAR(),
	amount DOUBLE,
	creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	broker VARCHAR,
	FOREIGN KEY (broker) REFERENCES Broker(company_name)
);