<?php

class DbConnector {

var $theQuery;
var $link;

function DbConnector(){

        
 $host = 'localhost';
$db = 'mydatabase';
$user = 'root';
$pass = '140573';
	
	
/*

$host = "mysql7.000webhost.com";
$user = "a5899716_silvia";
$pass = "160989london";
$db = "a5899716_ddbb";
*/


        // Connect to the database
        $this->link = mysql_connect($host, $user, $pass);
        mysql_select_db($db);
        register_shutdown_function(array(&$this, 'close'));

    }
	
  //*** Function: query, Purpose: Execute a database query ***
    function query($query) {

        $this->theQuery = $query;
        return mysql_query($query, $this->link);

    }

    //*** Function: fetchArray, Purpose: Get array of query results ***
    function fetchArray($result) {

        return mysql_fetch_array($result);

    }

    //*** Function: close, Purpose: Close the connection ***
    function close() {

        mysql_close($this->link);

    }
	
}

?>