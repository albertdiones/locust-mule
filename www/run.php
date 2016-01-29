<?php
/**
 * 1. Connects to source database
 * 2. Checks the source table for Rows Per Run number of rows that is greater than Last Id (ordered by id ASC)
 * 3. Connects to the target database
 * 4. Inserts the rows to target table
 * 5. done and log
 */

require "add_configure.php";
#ob_start();
debug::log("run.php - " .date ("h:i:s d-m-Y"));

# Gets an active project
$project = project::get_one(array('status' => 'active'),'last_run_time ASC');
debug::log("running project: " . $project);

# 1. Connects to source database
# 2. Checks the source table for Rows Per Run number of rows that is greater than Last Id (ordered by id ASC)
$source_db = new source_target_adodb(ADONewConnection($project->source_db_type));
if (!$source_db->Connect($project->source_host, $project->source_username, $project->source_password)) {
   throw new e_system("Failed to connect to source database");
}
$source_db->debug = project::db()->debug;

$source_model = (string) new fluid_model($project->source_table,$project->source_pk,$source_db);

debug::log("Source model: ".$source_model);
debug::log("Source model table: ".$source_model::TABLE);
#debug::var_dump($source_model::db());

if ($project->last_page === null) {
   $project->last_page = 0;
}

$source_data = $source_model::get_where_order_page(null,null,$project->last_page+1,$project->rows_per_run);

$project->last_page += 1;
$project->update_db_row();

$count = count($source_data);
debug::log("Fetched rows from source - count: " . $count);

if (!$count) {
   $project->status = 'inactive';
   throw new e_system("Warning: no rows fetched from source table");
}

# 3. Connects to the target database
# 4. Inserts the rows to target table
$target_db = new source_target_adodb(ADONewConnection($project->target_db_type));

if (!$target_db->Connect($project->target_host, $project->target_username, $project->target_password)) {
   throw new e_system("Failed to connect to target database");
}
$source_db->debug = project::db()->debug;

$target_model = (string) new fluid_model($project->target_table,$project->target_pk,$target_db);
$inserted_rows = 0;
foreach ($source_data as $source_datum) {
   $inserted_rows += (int) (bool) $target_model::add_new($source_datum->data_array());
   #debug::log("Inserted row to target: " . $source_datum);
}

debug::log("Inserted rows: ".$inserted_rows);

# 5. done and log

run_log::add_new( array('log' => debug::$log,'insert_time' => time() ) );


