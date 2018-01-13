<!DOCTYPE HTML>
<html>
    <link rel="stylesheet" href="styleSheet.css" type="text/css">
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
    <h1>To Do Application</h1>

    <?php
    $server = new serverInfo();
    $server->createDatabase();
    ?>


    <table class="table1">
        <th>Total Tasks</th>
        <tr>
            <td>
                <?php
                $result = new taskClass();
                $result = $result->getTasks();
                $count = $result->num_rows;
                settype($count, "string");
                echo $count;
                ?>
            </td>
        </tr>
    </table>

    <span></span>

    <table class="table2">
        <th><a href="pendingPage.php">Pending Tasks</a></th>
        <th><a href="startedPage.php">Started Tasks</a></th>
        <th><a href="completedPage.php">Completed Tasks</a></th>
        <th><a href="latePage.php">Late Tasks</a></th>
        <tr>
            <td>
                <?php
                $result = new status();
                $result = $result->getPending();
                $count = $result->num_rows;
                settype($count, "string");
                echo $count;
                ?>
            </td>
            <td>
                <?php
                $result = new status();
                $result = $result->getStarted();
                $count = $result->num_rows;
                settype($count, "string");
                echo $count;
                ?>
            </td>
            <td>
                <?php
                $result = new status();
                $result = $result->getCompleted();
                $count = $result->num_rows;
                settype($count, "string");
                echo $count;
                ?>
            </td>
            <td>
                <?php
                $result = new status();
                $result = $result->getLate();
                $count = $result->num_rows;
                settype($count, "string");
                echo $count;
                ?>
            </td>
        </tr>
    </table>

    <span></span>



    <div id="twoButtons">
        <a id="insertButton" href="insert.php"><button>INSERT TASK</button></a>
        <a id="updateButton" href="update.php"><button>UPDATE TASK</button></a>
        <a id="deleteButton" href="delete.php"><button>DELETE TASK</button></a>
    </div>

    <br>

    <table class="table3">
        <th>Task</th>
        <th>Description</th>
        <th>Status</th>
        <th>Due Date</th>
        <?php
        if(isset($_POST['tasktype'])){

        } else {
            $result = new taskClass();
            $result = $result->getEverything();

            if($result) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr><td>";
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