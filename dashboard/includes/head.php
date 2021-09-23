<?php


    require_once "includes/functions.php";
    $func = new Functions();


    $func->authenticate(); //CHeck if user is loggedin

    $current_user = $func->user();

    $func->logout();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUVI - Internship Project | Dashboard</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- FONT_AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="row my-3 border py-2">
              <div class="col-sm-10"><h5 class="username">@ <?php  echo $_SESSION['user_id'] ?></h1></div>
            <div class="col-sm-2">
                <a href="?logout=1" class="logout nav-link"><i class="fa fa-sign-out"></i>Logout</a>
            </div>
        </div>