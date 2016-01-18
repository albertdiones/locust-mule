<?php
require 'config.php';
#echo "ADD DIR: ".$C->add_dir;
require $C->add_dir.'/init.php';

#date_default_timezone_set(add::config()->default_timezone);

if (add::config()->debug_sql && add::is_development() && add::is_developer()) {
   locust_mule_db::singleton()->debug = true;
}