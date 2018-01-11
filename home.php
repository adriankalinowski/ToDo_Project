<!DOCTYPE HTML>
<html>
    <link rel="stylesheet" href="styleSheet.css" type="text/css">
    <?php include("serverInfo.php"); ?>
<head>
    <title>ToDo List</title>
</head>
<body>
    <h1>Hello Wiz!</h1>

    <?php
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

    $stmt = "CREATE TABLE IF NOT EXISTS status(taskid INT, taskStatus VARCHAR(20), PRIMARY KEY(taskid), FOREIGN KEY(taskid) REFERENCES tasks(taskid))";
    if($connect->query($stmt) === TRUE) {
        //echo "executed";
    }
    else {
        echo "Failed";
    }

    $stmt = "CREATE TABLE IF NOT EXISTS due_date(taskid INT, dueDate VARCHAR(20), PRIMARY KEY(taskid), FOREIGN KEY(taskid) REFERENCES tasks(taskid))";
    if($connect->query($stmt) === TRUE) {
        //echo "executed";
    }
    else {
        echo "Failed";
    }

    $connect->close();
    ?>


    <?php
    $server = new serverInfo();
    $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
    if ($connect->connect_error){ die(); }

    $stmt = "INSERT INTO tasks(taskName, description) VALUES('Finish app', 'Create and finish todo app')";
    if($connect->query($stmt) === FALSE){
        echo "Fuck me";
    }

    $connect->close();
    ?>

    <table class="table1">
        <th>Total Tasks</th>
        <tr>
            <td>22</td>
        </tr>
    </table>

    <span></span>

    <table class="table2">
        <th>Pending Tasks</th>
        <th>Started Tasks</th>
        <th>Completed Tasks</th>
        <th>Late Tasks</th>
        <tr>
            <td>10</td>
            <td>2</td>
            <td>5</td>
            <td>5</td>
        </tr>
    </table>

    <span></span>

    <form action="" method="post">
        <input type="checkbox" name="tasktype" value="pending">Pending
        <input type="checkbox" name="tasktype" value="started">Started
        <input type="checkbox" name="tasktype" value="completed">Completed
        <input type="checkbox" name="tasktype" value="late">Late
    </form>

    <span></span>

    <table class="table3">
        <th>Task</th>
        <th>Description</th>
        <th>Status</th>
        <th>Due Date</th>
        <tr>
            <td>Sample</td>
        </tr>
        <?php
        if(isset($_POST['tasktype'])){

        }
        ?>
    </table>


</body>
</html>