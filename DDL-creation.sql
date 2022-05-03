/*commands to create the users table*/
CREATE TABLE users (
    username VARCHAR(50) NOT NULL PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL
);
/*commands to create the admin accout i used*/
INSERT INTO `users` (`username`, `password`, `firstname`, `lastname`) VALUES ('Admin', 'Coff33!', 'Madison', 'Bennett');

/*commands to create the users table*/
CREATE TABLE orders (
    order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL,
    FOREIGN KEY (user_id)
        REFERENCES users(username),
    size VARCHAR(255) NOT NULL,
    base VARCHAR(255) NOT NULL,
    color VARCHAR(255) NOT NULL,
    scent VARCHAR(255) NOT NULL,
    crystals VARCHAR(255) NOT NULL
);

