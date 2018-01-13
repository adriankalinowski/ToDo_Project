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

    function getEverything() {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $stmt = "select * from tasks, status, due_date where taskid=taskidS AND taskid=taskidD GROUP BY taskid";
        $result = $connect->query($stmt);

        return $result;
    }

    function insertTask($name, $desc, $status, $date){
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $pstmt = $connect->prepare("INSERT INTO tasks(taskName, description) VALUES(?,?)");
        $pstmt->bind_param("ss",$tname, $tdesc);

        $tname = $name;
        $tdesc = $desc;
        $pstmt->execute();
        $pstmt->close();

        $id = $connect->insert_id;

        $pstmt = $connect->prepare("INSERT INTO status(taskidS, taskStatus) VALUES(?,?)");
        $pstmt->bind_param("is",$tid, $tstatus);

        $tid = $id;
        $tstatus = $status;
        $pstmt->execute();
        $pstmt->close();

        $pstmt = $connect->prepare("INSERT INTO due_date(taskidD, dueDate) VALUES(?,?)");
        $pstmt->bind_param("is",$id, $tdate);

        $tid = $id;
        $tdate = $date;
        $pstmt->execute();
        $pstmt->close();

        $connect->close();
    }

    function deleteTask($id) {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $pstmt = $connect->prepare("DELETE FROM tasks WHERE taskid=?");
        $pstmt->bind_param("i",$tid);

        $tid = $id;
        $pstmt->execute();
        $pstmt->close();

        $connect->close();
    }

    function updateTaskName($id, $name) {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $pstmt = $connect->prepare("UPDATE tasks SET taskName=? WHERE taskid=?");
        $pstmt->bind_param("si", $tname, $tid);

        $tname = $name;
        $tid = $id;
        $pstmt->execute();
        $pstmt->close();

        $connect->close();
    }

    function updateTaskDescription($id, $desc) {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $pstmt = $connect->prepare("UPDATE tasks SET description=? WHERE taskid=?");
        $pstmt->bind_param("si", $tdesc, $tid);

        $tdesc = $desc;
        $tid = $id;
        $pstmt->execute();
        $pstmt->close();

        $connect->close();
    }

    function updateTaskStatus($id, $status) {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $pstmt = $connect->prepare("UPDATE status SET taskStatus=? WHERE taskidS=?");
        $pstmt->bind_param("si", $tstatus, $tid);

        $tstatus = $status;
        $tid = $id;
        $pstmt->execute();
        $pstmt->close();

        $connect->close();
    }

    function updateTaskDate($id, $date) {
        $server = new serverInfo();
        $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
        if ($connect->connect_error){ die(); }

        $stmt = "use todo";
        $connect->query($stmt);

        $pstmt = $connect->prepare("UPDATE due_date SET duedate=? WHERE taskidD=?");
        $pstmt->bind_param("si", $tdate, $tid);

        $tdate = $date;
        $tid = $id;
        $pstmt->execute();
        $pstmt->close();

        $connect->close();
    }
}

?>