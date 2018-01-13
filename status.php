<?php

class status
{
    var $status = "";

    function setStatus($status) { $this->status = $status; }
    function setStatusPending() { $this->status = "pending"; }
    function setStatusStarted() { $this->status = "started"; }
    function setStatusCompleted() { $this->status = "completed"; }
    function setStatusLate() { $this->status = "late"; }

    function getStatus() { return $this->status; }

    function getAll() {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $stmt = "SELECT * FROM status";
        $result = $connect->query($stmt);

        return $result;
    }

    function getPending() {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $stmt = "SELECT * FROM status WHERE taskStatus='pending'";
        $result = $connect->query($stmt);

        return $result;
    }

    function getStarted() {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $stmt = "SELECT * FROM status WHERE taskStatus='started'";
        $result = $connect->query($stmt);

        return $result;
    }

    function getCompleted() {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $stmt = "SELECT * FROM status WHERE taskStatus='completed'";
        $result = $connect->query($stmt);

        return $result;
    }

    function getLate() {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $stmt = "SELECT * FROM status WHERE taskStatus='late'";
        $result = $connect->query($stmt);

        return $result;
    }
}