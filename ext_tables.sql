#
# Table structure for table 'be_users'
#
CREATE TABLE be_users (

	username varchar(255) DEFAULT '' NOT NULL,
	password varchar(255) DEFAULT '' NOT NULL,
	real_name varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	usergroup int(11) unsigned DEFAULT '0',

);

#
# Table structure for table 'be_groups'
#
CREATE TABLE be_groups (

	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,

);
