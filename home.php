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
    <h1>Hello Wiz!</h1>

    <?php
    $server = new serverInfo();
    $server->createDatabase();
    ?>


    <?php /*
    $server = new serverInfo();
    $connect = new mysqli($server->getServerName(), $server->getusername(), $server->getpassword());
    if ($connect->connect_error){ die(); }

    $stmt = "use todo";
    $connect->query($stmt);

    $pstmt = $connect->prepare("INSERT INTO tasks(taskName, description) VALUES(?,?)");
    $pstmt->bind_param("ss",$name, $desc);

    $name = "task1";
    $desc = "desc1";
    $pstmt->execute();

    //if($connect->query($stmt) === FALSE){
     //   echo "Fuck me";
    //}
    $pstmt->close();
    $connect->close(); */
    $temp = new taskClass();
    //$temp->insertTask("task1","desc1","started","10/1/18")
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
        <th>Pending Tasks</th>
        <th>Started Tasks</th>
        <th>Completed Tasks</th>
        <th>Late Tasks</th>
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
    <form action="" method="post">
        <input type="checkbox" name="tasktype" value="pending">Pending
        <input type="checkbox" name="tasktype" value="started">Started
        <input type="checkbox" name="tasktype" value="completed">Completed
        <input type="checkbox" name="tasktype" value="late">Late
    </form>

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