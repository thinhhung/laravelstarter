CREATE DATABASE homestead;
CREATE USER homestead@'localhost' IDENTIFIED BY 'secret';
GRANT ALL PRIVILEGES ON homestead.* TO 'homestead'@'localhost';
FLUSH PRIVILEGES;