<?php

    // SIGNUP
    if(isset($_POST['action']) && $_POST['action'] == 'signup')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];
        

        if(empty($username) || empty($password) || empty($confirm_password))
        {
            echo json_encode(['status'=> 0, 'message'=> "One or more fields is empty"]);
            exit;
        }

        if(!isset($_POST['terms'])) //CHeck if user agreed to terms and policies
        {
            echo json_encode(['status'=> 0, 'message'=> "Read and Agree to our Terms and Policies"]);
            exit;
        }

        if($password !== $confirm_password)
        {
            echo json_encode(['status'=> 0, 'message'=> "Passwords do not match."]);
            exit;
        }

        // Add to database after validation
        require_once '../../config/controller.php';
        $controller = new Controller();
        $response = $controller->new($username, $password);
        if($response == "SUCCESS")
        {
            echo json_encode(['status'=> 1, 'message'=> "Account created successfully. <a href='javascript:;' class='hide-signup'>Login</a>"]);
            exit;
        }elseif ($response == "EXISTS") {
            echo json_encode(['status'=> 0, 'message'=> "Sorry, Username '$username' has been taken."]);
            exit;
        }else{
            echo json_encode(['status'=> 0, 'message'=> "Sorry something went wrong. Try again later!"]);
            exit;
        }
    
    }

    // LOGIN
    if(isset($_POST['action']) && $_POST['action'] == 'signin')
    {
        $username = $_POST['uname'];
        $password = $_POST['upass'];
       

        if(empty($username) || empty($password))
        {
            echo json_encode(['status'=> 0, 'message'=> "One or more field(s) is empty"]);
            exit;
        }

        // Add to database after validation
        require_once '../../config/controller.php';
        $controller = new Controller();
        $response = $controller->login($username, $password);
        if($response == 1)
        {
            echo json_encode(['status'=> 1, 'message'=> "Login successful"]);
            exit;
        }elseif ($response == 0) {
            echo json_encode(['status'=> 0, 'message'=> "Incorrect username or password"]);
            exit;
        }else{
            echo json_encode(['status'=> 0, 'message'=> "Sorry something went wrong. Try again later!"]);
            exit;
        }
    
    }

?>