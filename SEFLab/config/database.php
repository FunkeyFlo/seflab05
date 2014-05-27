<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database
 *
 * @author Florentijn
 */
class Database {

    var $host = "localhost"; // Host name 
    var $username = "root"; // Mysql username 
    var $password = "App3ls@p!"; // Mysql password 
    var $db_name = "seflab"; // Database name 
    var $tbl_name; // Table name 

    function openConnection() {
        // Connect to server and select databse.
        mysql_connect("$this->host", "$this->username", "$this->password") or die("cannot connect");
        mysql_select_db("$this->db_name") or die("cannot select DB");
    }

    function closeConnection() {
        mysql_close();
    }
}