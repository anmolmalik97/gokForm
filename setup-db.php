#!/usr/bin/env php
<?php

require_once(dirname(__FILE__) . "/conf.php");

global $conn;

// Create table
$sql = "CREATE TABLE `gokform` (
	`form_pk` INT NOT NULL AUTO_INCREMENT,
	`date_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`type` VARCHAR(100),
	`state` VARCHAR(50) DEFAULT 'Karnataka',
	`district` VARCHAR(50),
	`camp_name` VARCHAR(100),
	`run_by` VARCHAR(100),
	`employer_name` VARCHAR(100),
	`sector` VARCHAR(100),
	`other_sector` VARCHAR(100),
	`locality` VARCHAR(100),
	`address` VARCHAR(500),
	`facilities` VARCHAR(500),
	`name` VARCHAR(100),
	`age` INT DEFAULT '0',
	`gender` CHAR(1),
	`occupation` VARCHAR(100),
	`other_occupation` VARCHAR(100) DEFAULT NULL,
	`mobile` VARCHAR(13) NOT NULL,
	`last_address` VARCHAR(100),
	`native_district` VARCHAR(100),
	`native_state` VARCHAR(100),
	`have_bankac` BOOLEAN DEFAULT '0',
	`have_jandhan` BOOLEAN DEFAULT '0',
	`account_no` VARCHAR(20),
	`ifsc` VARCHAR(20),
	`have_ujjwala` BOOLEAN DEFAULT '0',
	`aadhaar` VARCHAR(15),
	PRIMARY KEY (`form_pk`)
);";
$conn->exec($sql);
