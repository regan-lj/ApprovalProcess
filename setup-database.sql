CREATE TABLE requests (
  request_id INT AUTO_INCREMENT,
  submission_time DATETIME DEFAULT CURRENT_TIMESTAMP,
  status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
  fname varchar(20) NOT NULL,
  lname varchar(20) NOT NULL,
  email varchar(20) NOT NULL,
  description varchar(500),
  PRIMARY KEY (request_id)
);
