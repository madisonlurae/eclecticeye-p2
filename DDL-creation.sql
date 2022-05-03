CREATE TABLE users (
username VARCHAR(50) NOT NULL PRIMARY KEY,
password VARCHAR(255) NOT NULL,
firstname VARCHAR(255) NOT NULL,
lastname VARCHAR(255) NOT NULL
);

INSERT INTO `users` (`username`, `password`, `firstname`, `lastname`) VALUES ('Admin', 'Coff33!', 'Madison', 'Bennett');
