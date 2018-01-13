CREATE DATABASE cr_travel CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE USER 'crt_user'@'localhost' IDENTIFIED BY 'p0ssW0rd';
GRANT ALL PRIVILEGES ON cr_travel. * TO 'crt_user'@'localhost';