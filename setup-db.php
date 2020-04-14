#!/usr/bin/env php
<?php

require_once(dirname(__FILE__) . "/conf.php");

global $conn;

// Create table
$sql = "CREATE TABLE `gokform` (
	`form_pk` INT NOT NULL AUTO_INCREMENT,
	`date_added` TIMESTAMP NOT NULL DEFAULT 'CURRENT_TIMESTAMP' ON UPDATE CURRENT_TIMESTAMP,
	`type` VARCHAR,
	`state` VARCHAR DEFAULT 'Karnataka',
	`district` VARCHAR,
	`camp_name` VARCHAR,
	`run_by` VARCHAR,
	`facilities` VARCHAR,
	`name` VARCHAR,
	`age` INT DEFAULT '0',
	`gender` CHAR(1),
	`occupation` VARCHAR,
	`other_occupation` VARCHAR DEFAULT NULL,
	`mobile` VARCHAR NOT NULL,
	`last_address` VARCHAR,
	`native_district` VARCHAR,
	`native_state` VARCHAR,
	`have_bankac` BOOLEAN DEFAULT '0',
	`have_jandhan` BOOLEAN DEFAULT '0',
	`account_no` VARCHAR,
	`ifsc` VARCHAR,
	`have_ujjwala` BOOLEAN DEFAULT '0',
	`aadhaar` VARCHAR,
	PRIMARY KEY (`form_pk`)
);";
$conn->exec($sql);
