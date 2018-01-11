<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="styleSheetInsert.css" type="text/css">
<?php include("serverInfo.php"); ?>
<head>
    <title>ToDo List</title>
</head>
<body>
<h1>Insert new Task</h1>

<?php



$server = new serverInfo();
$connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
if ($connect->connect_error){ die(); }



?>

<form method="post">
    Task: <input type="text" name="task" value="">
    <br><br>
    Description: <textarea name="description" rows="5" cols="20"></textarea>
    <br><br>
    Due Date: <input type="text" name="duedate">
    <br><br>
    Status:
    <input type="radio" name="status" value="pending">Pending
    <input type="radio" name="status" value="started">Started
    <br><br>
    <input type="submit" name="submit" value="Insert">
</form>

</body>
</html>