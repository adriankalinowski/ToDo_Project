<?php

class status
{
    var $status = "";

    function setStatusPending() { $this->status = "pending"; }
    function setStatusStarted() { $this->status = "started"; }
    function setStatusCompleted() { $this->status = "completed"; }
    function setStatusLate() { $this->status = "late"; }

    function getStatus() { return $this->status; }
}