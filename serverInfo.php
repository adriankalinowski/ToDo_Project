<?php

class serverInfo
{
    var $serverName = "localhost";
    var $username = "root";
    var $password = "";

    function setServerName($serverName){$this->serverName = $serverName;}
    function setusername($username){$this->username = $username;}
    function setpassword($password){$this->password = $password;}

    function getServerName(){return $this->serverName;}
    function getusername(){return $this->username;}
    function getpassword(){return $this->password;}

    function createDatabase() {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "CREATE DATABASE IF NOT EXISTS todo";
        $connect->query($stmt);

        $stmt = "use todo";
        $connect->query($stmt);

        $stmt = "CREATE TABLE IF NOT EXISTS tasks(taskid INT AUTO_INCREMENT, taskName VARCHAR(50), description VARCHAR(250), PRIMARY KEY (taskid))";
        if($connect->query($stmt) === TRUE) {
            //echo "executed";
        }
        else {
            echo "Failed";
        }

        $stmt = "CREATE TABLE IF NOT EXISTS status(taskidS INT, taskStatus VARCHAR(20), PRIMARY KEY(taskidS), FOREIGN KEY(taskidS) REFERENCES tasks(taskid) ON DELETE CASCADE)";
        if($connect->query($stmt) === TRUE) {
            //echo "executed";
        }
        else {
            echo "Failed";
        }

        $stmt = "CREATE TABLE IF NOT EXISTS due_date(taskidD INT, dueDate VARCHAR(20), PRIMARY KEY(taskidD), FOREIGN KEY(taskidD) REFERENCES tasks(taskid) ON DELETE CASCADE)";
        if($connect->query($stmt) === TRUE) {
            //echo "executed";
        }
        else {
            echo "Failed";
        }

        $connect->close();
    }
}

?>