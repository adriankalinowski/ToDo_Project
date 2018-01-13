<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="styleSheetUpdate.css" type="text/css">
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
<h1>Update Task</h1>

<?php
$taskVar = new taskClass();
$statusVar = new status();
$duedateVar = new dueDateClass();

if(!empty($_POST["taskid"])) {
    if (!empty($_POST["task"])) {
        $taskVar->updateTaskName($_POST["taskid"], $_POST["task"]);
    }

    if (!empty($_POST["description"])) {
        $taskVar->updateTaskDescription($_POST["taskid"], $_POST["description"]);
    }

    if (!empty($_POST["duedate"])) {
        $taskVar->updateTaskDate($_POST["taskid"], $_POST["duedate"]);
    }

    if (!empty($_POST["status"])) {
        $taskVar->updateTaskStatus($_POST["taskid"], $_POST["status"]);
    }

    header("refresh:0; url=home.php");
}
?>

<form method="post">
    Task ID: <input type="text" name="taskid">
    <br><br>
    Task: <input type="text" name="task">
    <br><br>
    Description: <textarea name="description" rows="3" cols="12"></textarea>
    <br><br>
    Due Date: <input type="date" name="duedate">
    <br><br>
    Status:
    <input type="radio" name="status" value="pending">Pending
    <input type="radio" name="status" value="started">Started
    <input type="radio" name="status" value="completed">Completed
    <br><br>
    <input type="submit" name="submit" value="INSERT">
</form>

<br><br><br>

<table class="table3">
    <th>Task ID</th>
    <th>Task</th>
    <th>Description</th>
    <th>Status</th>
    <th>Due Date</th>
    <?php
    $result = new taskClass();
    $result = $result->getEverything();

    if($result) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>";
            echo $row['taskid'];
            echo "</td><td>";
            echo $row['taskName'];
            echo "</td><td>";
            echo $row['description'];
            echo "</td><td>";
            echo $row['taskStatus'];
            echo "</td><td>";
            echo $row['dueDate'];
            echo "</td></tr>";
        }
    }
    ?>
</table>

</body>
</html>