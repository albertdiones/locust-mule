<?php
/**
 * 1. Connects to source database
 * 2. Checks the source table for Rows Per Run number of rows that is greater than Last Id (ordered by id ASC)
 * 3. Connects to the target database
 * 4. Inserts the rows to target table
 * 5. done and log
 */

require "add_configure.php";
ob_start();
debug::log("run.php - " .date ("h:i:s d-m-Y"));

# Gets an active project
$project = project::get_one(array('status' => 'active'),'last_run_time ASC');
debug::log("running project: " . $project);

# 1. Connects to source database
# 2. Checks the source table for Rows Per Run number of rows that is greater than Last Id (ordered by id ASC)
$source_db = new source_target_adodb(ADONewConnection($project->source_db_type));
$source_db->Connect($project->source_host, $project->source_username, $project->source_password);
$source_model = (string) new fluid_model($project->source_table,$project->source_table_pk,$source_db);
$source_data = $source_model::get_where_order_page(
   $source_model::table_pk().' > '. $source_model::db()->quote($project->last_id),
   $source_model::table_pk().' ASC',
   1,$project->rows_per_run
);

debug::log("Fetched rows from source - count: " . count($source_data));

# 3. Connects to the target database
# 4. Inserts the rows to target table
$target_db = new source_target_adodb(ADONewConnection($project->target_db_type));
$target_db->Connect($project->target_host, $project->target_username, $project->target_password);
$target_model = (string) new fluid_model($target->target_table,$target->target_table_pk,$target_db);
foreach ($source_data as $source_datum) {
   $target_model::add_new($source_datum->data_array());
   debug::log("Inserted row to target: " . $source_datum);
}

# 5. done and log

run_log::add_new( array('log' => debug::$log ) );


