<?php

$C = (object) array(
   'root_dir' => dirname(__FILE__),
   'add_dir' => dirname(__FILE__).'/includes/add-framework',

   'environment_status' => 'development', # live or development
   'debug_sql' => false, # shows the sqls (when environment_status = 'development')
   'handle_shutdown' => true, # show pre shutdown debugging info (when environment_status = 'development')

   'default_timezone' => 'Asia/Manila',

   # database info
   'mysql_host' => '123.123.123.123',
   'mysql_db_name' => 'locust_mule',
   'mysql_username' => 'php',
   'mysql_password' => 'abcdefghijklmnopqrstuvwxyz'
);