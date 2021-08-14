CREATE DATABASE task_management;

CREATE TABLE The_user
(
    id int PRIMARY KEY AUTO_INCREMENT,
    first_name varchar(50),
    last_name varchar(50),
    email varchar(100) UNIQUE,
    login varchar(100) UNIQUE,
    photo text,
    password text,
    cin varchar(11) unique,
    role int
);

CREATE TABLE Project
(
    id int PRIMARY KEY AUTO_INCREMENT,
  	project_name varchar(30) NOT NULL,
  	description text NOT NULL,
  	start_date date,
  	end_date date,
  	price double
);

CREATE TABLE Task
(
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(50),
    description text,
    end_date date,
    status int,
    the_user_id int,
    project_id int,
    FOREIGN KEY (the_user_id) 
        REFERENCES The_user(id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (project_id) 
        REFERENCES Project(id)
        ON UPDATE CASCADE ON DELETE CASCADE
);