/*
Created		10. 02. 2015
Modified		11. 06. 2017
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table users (
	id Int NOT NULL AUTO_INCREMENT,
	country_id Int NOT NULL,
	first_name Varchar(200),
	last_name Varchar(200) NOT NULL,
	email Varchar(200) NOT NULL,
	pass Varchar(100) NOT NULL,
	date_birth Timestamp,
	description Text,
	avatar Varchar(255),
	hashcode Varchar(100) NOT NULL,
	active Int NOT NULL,
	admin Int NOT NULL,
	UNIQUE (email),
 Primary Key (id)) ENGINE = InnoDB;

Create table skills (
	id Int NOT NULL AUTO_INCREMENT,
	title Varchar(100) NOT NULL,
	description Text,
 Primary Key (id)) ENGINE = InnoDB;

Create table skills_users (
	id Int NOT NULL AUTO_INCREMENT,
	user_id Int NOT NULL,
	skill_id Int NOT NULL,
	rank Int NOT NULL,
 Primary Key (id)) ENGINE = InnoDB;

Create table countries (
	id Int NOT NULL AUTO_INCREMENT,
	title Varchar(100) NOT NULL,
	short Varchar(10) NOT NULL,
 Primary Key (id)) ENGINE = InnoDB;

Create table documents (
	id Int NOT NULL AUTO_INCREMENT,
	user_id Int NOT NULL,
	title Varchar(100) NOT NULL,
	url Varchar(255) NOT NULL,
	description Text,
 Primary Key (id)) ENGINE = InnoDB;

Create table projects (
	id Int NOT NULL AUTO_INCREMENT,
	title Varchar(150) NOT NULL,
	price Float NOT NULL,
	start_date Timestamp NOT NULL,
	end_date Timestamp,
	description Text NOT NULL,
	stage Int NOT NULL,
 Primary Key (id)) ENGINE = InnoDB;

Create table messages (
	id Int NOT NULL AUTO_INCREMENT,
	userfrom_id Int NOT NULL,
	userto_id Int NOT NULL,
	read Int NOT NULL,
	content Text NOT NULL,
	title Varchar(200) NOT NULL,
	date Timestamp NOT NULL,
 Primary Key (id)) ENGINE = InnoDB;

Create table attachments (
	id Int NOT NULL AUTO_INCREMENT,
	title Varchar(255) NOT NULL,
	url Varchar(255) NOT NULL,
	date Timestamp NOT NULL,
	description Text,
 Primary Key (id)) ENGINE = InnoDB;

Create table attachments_messages (
	id Int NOT NULL AUTO_INCREMENT,
	attachment_id Int NOT NULL,
	message_id Int NOT NULL,
 Primary Key (id)) ENGINE = InnoDB;

Create table ratings (
	id Int NOT NULL AUTO_INCREMENT,
	description Text NOT NULL,
	rating Int NOT NULL,
 Primary Key (id)) ENGINE = InnoDB;

Create table ratings_users (
	id Int NOT NULL AUTO_INCREMENT,
	usergiver_id Int NOT NULL,
	usergetr_id Int NOT NULL,
	rating1_id Int NOT NULL,
	date Timestamp NOT NULL,
 Primary Key (id)) ENGINE = InnoDB;

Create table projects_users (
	id Int NOT NULL,
	user_id Int NOT NULL,
	project_id Int NOT NULL,
 Primary Key (id)) ENGINE = InnoDB;

Create table comments (
	id Int NOT NULL,
	project_id Int NOT NULL,
	user_id Int NOT NULL,
	description Text NOT NULL,
 Primary Key (id)) ENGINE = InnoDB;


Alter table skills_users add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table documents add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table messages add Foreign Key (userfrom_id) references users (id) on delete  restrict on update  restrict;
Alter table messages add Foreign Key (userto_id) references users (id) on delete  restrict on update  restrict;
Alter table ratings_users add Foreign Key (usergiver_id) references users (id) on delete  restrict on update  restrict;
Alter table ratings_users add Foreign Key (usergetr_id) references users (id) on delete  restrict on update  restrict;
Alter table projects_users add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table comments add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table skills_users add Foreign Key (skill_id) references skills (id) on delete  restrict on update  restrict;
Alter table users add Foreign Key (country_id) references countries (id) on delete  restrict on update  restrict;
Alter table projects_users add Foreign Key (project_id) references projects (id) on delete  restrict on update  restrict;
Alter table comments add Foreign Key (project_id) references projects (id) on delete  restrict on update  restrict;
Alter table attachments_messages add Foreign Key (message_id) references messages (id) on delete  restrict on update  restrict;
Alter table attachments_messages add Foreign Key (attachment_id) references attachments (id) on delete  restrict on update  restrict;
Alter table ratings_users add Foreign Key (rating1_id) references ratings (id) on delete  restrict on update  restrict;


