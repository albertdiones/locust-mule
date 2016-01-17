<?php
/**
 * 1. Connects to source database
 * 2. Checks the source table for Rows Per Run number of rows that is greater than Last Id (ordered by id ASC)
 * 3. Connects to the target database
 * 4. Inserts the rows to target table
 * 5. done and log
 */

require "add_configure.php";
debug::log("run.php - " .date ("h:i:s d-m-Y"));

# Gets an active project
$project = project::get_one(array('status' => 'active'),'last_run_time ASC');

# 1. Connects to source database



# 2. Checks the source table for Rows Per Run number of rows that is greater than Last Id (ordered by id ASC)



# 3. Connects to the target database



# 4. Inserts the rows to target table



# 5. done and log

