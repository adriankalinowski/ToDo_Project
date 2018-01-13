<?php

class dueDateClass
{
    var $duedate = "";

    function setDueDate($duedate) { $this->duedate = $duedate; }

    function getDueDate() { return $this->duedate; }

    function getAll() {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $stmt = "SELECT * FROM due_date";
        $result = $connect->query($stmt);

        return $result;
    }
}

?>