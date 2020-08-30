CREATE TABLE requests (
  request_id INT AUTO_INCREMENT,
  submission_time DATETIME DEFAULT CURRENT_TIMESTAMP,
  status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
  fname varchar(20) NOT NULL,
  lname varchar(20) NOT NULL,
  email varchar(30) NOT NULL,
  description varchar(500) NOT NULL,
  PRIMARY KEY (request_id)
);

INSERT INTO requests (fname, lname, email, description) VALUES ('Bobby', 'Fischer', 'bfischer@gmail.com', 'Hi, my name is Bobby and I would like to join your chess club. I am an avid player and am free for Thursday meetups.');
INSERT INTO requests (fname, lname, email, description) VALUES ("Lewis", "Hamilton", "lewishamilton@merc.com", "Hi, I am applying for the position of go cart manager. I am hard working, and have a lot of experience with go carts.");
INSERT INTO requests (fname, lname, email, description) VALUES ("Jay", "Pritchett", "jay@pritchettclosets.com", "I'm from Pritchetts closets and I would like to enquire about an order for 5000 wooden panels of various sizes.");
