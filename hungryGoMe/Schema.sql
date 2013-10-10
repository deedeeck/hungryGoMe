CREATE TABLE admin 
(
	name VARCHAR(64) NOT NULL,
password VARCHAR(16) NOT NULL,
	email VARCHAR(64) PRIMARY KEY
);

CREATE TABLE member (
	name VARCHAR(64) NOT NULL,
password VARCHAR(16) NOT NULL,
	email VARCHAR(64) PRIMARY KEY
);

CREATE TABLE restaurant (
stall_name VARCHAR(64),
address VARCHAR(128), 
region VARCHAR(32),
ft_name VARCHAR(64),
rt_name VARCHAR(64),
telephone_number VARCHAR(10),
approve TINYINT NOT NULL DEFAULT '0',
submitDateTime DATETIME DEFAULT NULL,
PRIMARY KEY (stall_name, address) 
);

CREATE TABLE submit_entry(
m_email VARCHAR(64) REFERENCES member(email),
postDate DATETIME,
r_stall_name VARCHAR(64),
r_address VARCHAR(128),
FOREIGN KEY( r_stall_name , r_address) REFERENCES  restaurant(stall_name,  address), 
PRIMARY KEY(m_email, r_stall_name, r_address)
);

CREATE TABLE manage(
ad_email VARCHAR(64) REFERENCES admin(email),
r_stall_name VARCHAR(64),
r_address VARCHAR(128),
FOREIGN KEY(r_stall_name, r_address) REFERENCES restaurant(stall_name, address),
PRIMARY KEY ( ad_email, r_stall_name, r_address)
);

CREATE TABLE review (
rating INT NOT NULL,
prices DECIMAL(5,2) NOT NULL,
comments VARCHAR(256) NOT NULL,
m_email VARCHAR (64) REFERENCES member(email),
r_stall_name VARCHAR(64),
r_address VARCHAR(128),
reviewDataTime DATETIME,
FOREIGN KEY(r_stall_name,  r_address)  REFERENCES restaurant(stall_name,  address) ON DELETE CASCADE,
PRIMARY KEY (m_email,  r_stall_name, r_address)
);