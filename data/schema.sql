
CREATE DATABASE locust_mule;

USE locust_mule;

--
DROP TABLE IF EXISTS projects;
CREATE TABLE projects (
  target_table VARCHAR(128),
  target_host VARCHAR(64),
  source_table VARCHAR(128),
  source_host VARCHAR(64) DEFAULT 'localhost',

  status ENUM('active','inactive') DEFAULT 'inactive',
  last_run_time INT DEFAULT NULL,

  target_db_type VARCHAR(32) DEFAULT 'mysqli',
  target_pk VARCHAR(64) DEFAULT 'id',
  target_username VARCHAR(64) DEFAULT 'root',
  target_password VARCHAR(64) DEFAULT '',
  source_db_type VARCHAR(32) DEFAULT 'mysqli',
  source_pk VARCHAR(64) DEFAULT 'id',
  source_username VARCHAR(64) DEFAULT 'root',
  source_password VARCHAR(64) DEFAULT '',
  rows_per_run INT DEFAULT 10,
  last_page INT UNSIGNED DEFAULT 0,
  insert_time INT DEFAULT NULL,
  update_time INT DEFAULT NULL,
  PRIMARY KEY (target_table,target_host,source_table,source_host)
);

DROP TABLE run_logs;
CREATE TABLE run_logs (
  id          INT AUTO_INCREMENT,
  log         LONGTEXT,
  insert_time INT,
  PRIMARY KEY (id)
);