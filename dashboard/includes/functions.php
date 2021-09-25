<?php

    class Functions
    {
        public $HOME_DIR;
        public function __construct()
        {
            require_once "../config/controller.php";
            $this->HOME_DIR = "/guvi/";
        }
    
        public function user()
        {
            // session_start();
            $controller = new Controller();
            $id = $_SESSION[ 'userid'];
            return $controller->singlerecord($id);
        }

        public function authenticate()
        {
            $controller = new Controller();
            if (!$controller->is_loggedin()) {
                ob_start();
                session_unset();
                session_destroy();
                $controller->redirect($this->HOME_DIR);
            }
        }

        public function logout()
        {
            $controller = new Controller();
            if (isset($_GET['logout']) && $_GET['logout'] ==1) {
                ob_start();
                session_unset();
                session_destroy();
                $controller->redirect($this->HOME_DIR);
            }

        }
    }
?>