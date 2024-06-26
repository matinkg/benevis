<?php

class Model
{
    public $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }
}
