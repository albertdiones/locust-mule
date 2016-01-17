<?php
/**
 * Created by PhpStorm.
 * @author albert
 * Date: 1/18/16
 * Time: 3:41 AM
 */

require 'add_configure.php';


$current_controller = add::current_controller();

$current_controller -> execute();