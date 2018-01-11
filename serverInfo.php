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
}

?>