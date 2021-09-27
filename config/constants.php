<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define("HOST","localhost"); //Server name
define("USER","root"); //Database Username
define("PASS",NULL); // Database user PASSWORD
define("DB","guvi"); //Database Name


?>