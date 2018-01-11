<?php
class errorClass
{
    var $taskError = "";
    var $descriptionError = "";
    var $statusError = "";
    var $dueDateError = "";

    function setTaskError($taskError) { $this->taskError = $taskError;}
    function setDescriptionError($descriptionError) { $this->descriptionError = $descriptionError;  }
    function setStatusError($statusError) {$this->statusError = $statusError;}
    function setDueDateError($dueDateError) {$this->dueDateError = $dueDateError;}

    function getTaskError() {return $this->taskError;}
    function getDescriptionError() {return $this->descriptionError;}
    function getStatusError() {return $this->statusError;}
    function getDueDateError() {return $this->dueDateError;}
}

?>