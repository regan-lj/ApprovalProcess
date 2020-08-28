CREATE TABLE requests (
  request_id INT NOT NULL AUTO_INCREMENT = 1000,
  submission_time DATETIME DEFAULT CURRENT_TIMESTAMP,
  status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
  fname varcher(20) NOT NULL,
  lname varachar(20) NOT NULL,
  email varchae(20) NOT NULL,
  description varchar(500) NOT NULL,
  PRIMARY KEY (request_id)
);
