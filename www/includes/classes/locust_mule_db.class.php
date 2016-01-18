<?php
/**
 * Created by PhpStorm.
 * @author albert
 * Date: 1/18/16
 * Time: 3:40 AM
 */
/**
 * The adodb wrapper
 */
CLASS locust_mule_db EXTENDS add_adodb_mysql {

    /**
     *
     *
     * 
     */
    public function Connect() {
        return $this->adodb->Connect( add::config()->mysql_host, add::config()->mysql_username,add::config()->mysql_password, add::config()->mysql_db_name );
    }
}