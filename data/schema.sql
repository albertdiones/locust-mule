
CREATE DATABASE locust_mule;

CREATE TABLE projects (
  target_table VARCHAR(128),
  target_host VARCHAR(64),
  source_table VARCHAR(128),
  source_host VARCHAR(64),

  target_username VARCHAR(64),
  target_password VARCHAR(64),
  source_username VARCHAR(64),
  source_password VARCHAR(64),
  rows_per_run INT,
  last_id VARCHAR(64),
  insert_time INT,
  update_time INT
);

CREATE TABLE run_logs (
  id INT,

  log LONGTEXT,
  insert_time INT
)