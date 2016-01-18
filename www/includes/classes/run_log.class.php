<?php
/**
 * Created by PhpStorm.
 * @author albert
 * Date: 1/18/16
 * Time: 3:40 AM
 */
CLASS run_log EXTENDS model_rwd {

    const TABLE = 'run_logs';
    const TABLE_PK = 'id';
    
    public static function db() {
        return locust_mule_db::singleton();
    }
}