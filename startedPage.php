<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="styleSheetFilter.css" type="text/css">
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
<h1>Started Tasks</h1>

<br>
<div id="return">
    <a href="home.php"><button>RETURN</button></a>
</div>
<br>

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
            if($row["taskStatus"] === "started") {
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
    }
    ?>
</table>


</body>
</html>