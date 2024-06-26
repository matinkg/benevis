<?php

class Controller
{
    public $db;
    protected $user_id;

    public function __construct()
    {
        // add global $db to access the database connection
        global $db;
        $this->db = $db;

        session_start();

        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
        }
    }

    public function isUserLoggedIn()
    {
        return isset($this->user_id);
    }

    public function renderView($path, $args = [], $return = false)
    {
        $path = __DIR__ . '/../views/' . $path;
        
        if (is_file($path)) {
            ob_start();
            extract($args);
            include($path);

            if ($return) {
                return ob_get_clean();
            }

            echo ob_get_clean();
            return true;
        }

        return false;
    }
}
