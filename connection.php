<?php
class Database {
    var $host="localhost";
    var $username="root";    // specify the sever details for mysql
    Var $password="";
    var $database="phpmysql";
    var $myconn;
    function connectToDatabase() // create a function for connect database
    {
        $conn= mysqli_connect($this->host,$this->username,$this->password);
        if(!$conn)// testing the connection
        {
            return false;
        }
        else
        {
            $this->myconn = $conn;
            mysqli_select_db($this->myconn,$this->database);
            return true;
        }
  }
  function closeConnection() // close the connection
    {
        mysqli_close($this->myconn);
        //echo "Connection closed";
    }
}
?>
