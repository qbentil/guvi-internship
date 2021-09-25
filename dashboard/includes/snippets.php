<?php

class Snippets
{

    public function __construct()
    {
        require_once "../config/controller.php";
        require_once "functions.php";
    }

    public function head()
    {
        $func = new Functions();
        //authenticate user
        $func->authenticate();

        // init logout statement
        $func->logout();
        $username = $func->user()['username'];
        return "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0,shrink-to-fit=no, user-scalable=no'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>GUVI - Internship Project | Dashboard</title>

            <!-- BOOTSTRAP CSS -->
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>

            <!-- FONT_AWESOME -->
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

            <!-- CUSTOM CSS -->
            <link rel='stylesheet' href='../assets/css/style.css'>
        </head>

        <body>
            <div class='container'>
                <div class='row my-3 border py-2'>
                    <div class='col-sm-10'><h5 class='username'>@ $username </h1></div>
                    <div class='col-sm-2'>
                        <a href='?logout=1' class='logout nav-link'><i class='fa fa-sign-out'></i>Logout</a>
                    </div>
                </div>
        ";
    }
    public function user_photo()
    {
        $func = new Functions();
        $user = $func->user();
        $photo = isset($user['image'])? $user['image']: 'avatar.png';
        $path = $func->HOME_DIR."assets/images/users/".$photo;
        return "
        <div class='col-sm-4 col-md-4 py-3'>
            <div class='text-center my-3'>
                <img src='$path' class='avatar img-circle img-thumbnail' style='width: 300px;' alt='avatar'><br>
                <i>Upload a different photo...</i>
                <div class='form-group'>   
                </div>

                <form  id = 'update_photo' method='post' enctype='multipart/form-data'>
                    <div class='ajax-message'></div>
                    <div class='input-group mb-3'>
                        <div class='custom-file'>
                            <label class='custom-file-label' for='user_image'>Choose file</label>
                            <input type='file' name='user_image' id='user_image' class='custom-file-input text-center center-block file-upload' />
                        </div>
                    </div>
                </form>
            </div>
        </div>";
    }

    public function profile_form()
    {
        $func = new Functions();
        $user = $func->user();
        $first_name =$user['first_name'];
        $last_name = $user['last_name'];
        $email = $user['email'];
        $phone =  $user['phone'];
        $location = $user['location'];
        return "
        <form class = 'needs-validation' id='update_profile' method='post' novalidate>
            <div class='ajax-message'></div>
            <div class='form-group'>
                <div class='col-xs-6'>
                    <label for='first_name'>First name</h4></label>
                    <input type='text' class='form-control' name='first_name' id='first_name' value='$first_name' placeholder='first name' title='enter your first name if any.' required>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-xs-6'>
                    <label for='last_name'>Last name</h4></label>
                    <input type='text' class='form-control' name='last_name' id='last_name' value = '$last_name' placeholder='last name' title='enter your last name if any.' required>
                </div>
            </div>

            <div class='form-group'>
                <div class='col-xs-6'>
                    <label for='phone'>Phone</label>
                    <input type='text' class='form-control' name='phone' id='phone' value = '$phone' placeholder='enter phone' title='enter your phone number if any.' required>
                </div>
            </div>
            <div class='form-group'>
                
                <div class='col-xs-6'>
                    <label for='email'>Email</label>
                    <input type='email' class='form-control' name='email' id='email' value = '$email' placeholder='you@email.com' title='enter your email.' required>
                </div>
            </div>
            <div class='form-group'>
                
                <div class='col-xs-6'>
                    <label for='location'>Location</label>
                    <input type='text' class='form-control' name='location' id='location' placeholder='enter address' value = '$location' title='enter a location' required>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-xs-12'>
                        <br>
                        <button class='btn  btn-success' type='submit'><i class='fa fa-check'></i> Save</button>
                        <button class='btn btn-outline-primary' type='reset'><i class='fa fa-repeat'></i> Reset</button>
                    </div>
            </div>
        </form>     
        ";
    }

    public function security_form()
    {
        return "
        <form class='needs-validation' id = 'change_password' method='post' novalidate >
            <div class='ajax-message'></div>
            <div class='form-group'>
                <div class='col-xs-6'>
                    <label for='password'>Current Password</label>
                    <input type='password' class='form-control' name='current' id='password' placeholder='Current password' title='enter your current password.' autocomplete='off' required>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-xs-6'>
                    <label for='password'>New Password</label>
                    <input type='password' class='form-control' name='new' id='new-password' placeholder='New password' title='enter a new password.' autocomplete='off' required>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-xs-6'>
                    <label for='password2'>Verify</label>
                    <input type='password' class='form-control' name='confirm' id='password-confirm' placeholder='Verify Password' title='verify your password.' autocomplete='off' required>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-xs-12'>
                        <br>
                        <button class='btn  btn-success' type='submit'><i class='fa fa-check'></i> Save</button>
                        <button class='btn btn-outline-primary' type='reset'><i class='fa fa-repeat'></i> Reset</button>
                    </div>
            </div>
        </form>
        ";
    }


    
}