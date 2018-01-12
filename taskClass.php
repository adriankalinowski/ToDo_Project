<?php

class taskClass
{
    var $taskName = "";
    var $description = "";

    function setTaskName($taskName){ $this->taskName = $taskName; }
    function setDescription($description){ $this->description = $description; }

    function getTaskName(){ return $this->taskName; }
    function getDescription(){ return $this->description; }

    function getTasks() {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $stmt = "SELECT * FROM tasks";
        $result = $connect->query($stmt);

        return $result;
    }
}

?>