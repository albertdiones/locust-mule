CREATE DATABASE locust_mule_test;

USE locust_mule_test;


CREATE TABLE fruits
(
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `fruit` VARCHAR(32)
)
;

INSERT INTO fruits(`fruit`)
VALUES('orange'),('apple'),('banana'),('mango'),('dalandan');

CREATE DATABASE locust_mule_test2;

USE locust_mule_test2;

CREATE TABLE fruits
(
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `fruit` VARCHAR(32)
);

USE locust_mule;
INSERT INTO projects
(`target_table`,`target_host`,`source_table`,`source_host`,`rows_per_run`,`status`)
    VALUES
      (
        'locust_mule_test2.fruits','localhost',
        'locust_mule_test.fruits','localhost',
        1,'active'
      )
;
-- update credentials after (or host)
SELECT * FROM projects;
SELECT * FROM locust_mule_test2.fruits;