<?php

class taskClass
{
    var $taskName = "";
    var $description = "";

    function setTaskName($taskName){ $this->taskName = $taskName; }
    function setDescription($description){ $this->description = $description; }

    function getTaskName(){ return $this->taskName; }
    function getDescription(){ return $this->description; }
}

?>