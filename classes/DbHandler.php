<?php

/* 
 * DbHandler.php
 * 
 * Class to handle all database operations
 * 
 * This class will have all the CRUD methods:
 * C - Create
 * R - Read
 * U - Update
 * D - Delete
 */

class DbHandler{
    
    //private variable to hold the connection
    private $conn;
    
    //Constructor object - will run automatically when class is instantiated
    function __construct() {
        //Initialize the database
        require_once dirname(__FILE__.'/DbConnect.php');
        //open db Connection
        try{
            $db = new DbConnect();
            $this->conn = $db->connect();
            
        } catch (Exception $ex) {
            $this::dbConnectError($ex->getCode());
        }
        
    } //end of constructor
    
    //Create a static function called dbConnectError
    //A static function can be called without instantiating the class
    //in other words no need ti use the new keyword
    private static function dbConnectError($code){
        switch ($code) {
            case 1045:
                echo "A database access error has occured!";
                break;
            case 2002:
                echo "A database server error has occured!";
                break;
            default:
                echo "A sevrer error has occured!";
                break;
        } //end of switch
        
    } //end of dbConnectError
    
} //end of class
