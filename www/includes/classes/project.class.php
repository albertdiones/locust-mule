<?php
/**
 * Created by PhpStorm.
 * @author albert
 * Date: 1/18/16
 * Time: 3:39 AM
 */
CLASS project EXTENDS model_multi_pk {

    const TABLE = 'projects';
    static $TABLE_PKS = array('target_table','target_host','source_table','source_host');
    
    public static function db() {
        return locust_mule_db::singleton();
    }
}