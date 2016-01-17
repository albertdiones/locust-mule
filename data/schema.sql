
CREATE DATABASE locust_mule;

CREATE TABLE projects (
  target_table VARCHAR(128),
  target_host VARCHAR(64),
  source_table VARCHAR(128),
  source_host VARCHAR(64) DEFAULT 'localhost',

  target_username VARCHAR(64) DEFAULT 'root',
  target_password VARCHAR(64) DEFAULT '',
  source_username VARCHAR(64) DEFAULT 'root',
  source_password VARCHAR(64) DEFAULT '',
  rows_per_run INT DEFAULT 10,
  last_id VARCHAR(64) DEFAULT NULL,
  insert_time INT,
  update_time INT
);

CREATE TABLE run_logs (
  id INT,

  log LONGTEXT,
  insert_time INT
)