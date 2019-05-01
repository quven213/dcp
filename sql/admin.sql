CREATE TABLE admin(
  id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  name varchar(50) NOT NULL,
  username varchar(50) NOT NULL,
  password varchar(150) NOT NULL,
  status char(1) NOT NULL
);
