--
-- Table structure for table `tblproduct`
--

CREATE TABLE IF NOT EXISTS products (
  id int(8) AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  code varchar(255) NOT NULL,
  image text NOT NULL,
  price double(10,2) NOT NULL,
  PRIMARY KEY (id)
);