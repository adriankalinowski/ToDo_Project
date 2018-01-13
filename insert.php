<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="styleSheetInsert.css" type="text/css">
<?php
include("serverInfo.php");
include("taskClass.php");
include("status.php");
include("dueDateClass.php");
?>
<head>
    <title>ToDo List</title>
</head>
<body>
<h1>Insert new Task</h1>

<?php
    $taskVar = new taskClass();
    $statusVar = new status();
    $duedateVar = new dueDateClass();

    if(!empty($_POST["task"])){
        $taskVar->setTaskName($_POST["task"]);
    }

    if(!empty($_POST["description"])){
        $taskVar->setDescription($_POST["description"]);
    }

    if(!empty($_POST["duedate"])){
        $duedateVar->setDueDate($_POST["duedate"]);
    }

    if(!empty($_POST["status"])){
        $statusVar->setStatus($_POST["status"]);
    }
    if(!empty($_POST["task"]) && !empty($_POST["description"]) && !empty($_POST["duedate"]) && !empty($_POST["status"])) {
        $taskVar->insertTask($taskVar->getTaskName(), $taskVar->getDescription(), $statusVar->getStatus(), $duedateVar->getDueDate());
        header("refresh:0; url=home.php");
    }
?>

<form style="text-align: center" method="post">
    Task Name: <input type="text" name="task" value="">
    <br><br>
    Description: <textarea name="description" rows="5" cols="20"></textarea>
    <br><br>
    Due Date: <input type="date" name="duedate">
    <br><br>
    Status:
    <input type="radio" name="status" value="pending">Pending
    <input type="radio" name="status" value="started">Started
    <br><br>
    <input type="submit" name="submit" value="INSERT">
</form>

</body>
</html>