<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="styleSheetDelete.css" type="text/css">
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
<h1>Delete Task</h1>

<?php
$taskVar = new taskClass();

if(!empty($_POST["taskid"])){
    //$taskVar->setTaskName($_POST["taskid"]);
    $taskVar->deleteTask($_POST["taskid"]);
    header("refresh:0; url=home.php");
}
?>

<form method="post">
    Task ID: <input type="text" name="taskid">
    <input type="submit" name="submit" value="DELETE">
    <br><br>
    Task ID: <select class="form-dropdown" id="dropdown" name="drop">
        <?php
        $result = $result->getEverything();

        if($result) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<option>";
                echo $row['taskid'];
                echo "</option>";
            }
        }
        ?>
    </select>
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