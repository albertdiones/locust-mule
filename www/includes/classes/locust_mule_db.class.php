<?php
/**
 * Created by PhpStorm.
 * @author albert
 * Date: 1/18/16
 * Time: 3:40 AM
 */
/**
 * The adodb wrapper
 * @todo check the parent class (add_adodb_mysql)
 */
CLASS locust_mule_db EXTENDS add_adodb_mysql {

    /**
     *
     * @todo change the credentials
     *
     * @todo change the db name
     *
     * 
     */
    public function Connect() {
        return $this->adodb->Connect("localhost","root","","mydb");
    }
}