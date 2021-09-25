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

    // UPDATE PROFILE
    if(isset($_POST['action']) && $_POST['action'] == 'update_profile')
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $location = $_POST['location'];

        

        if(empty($first_name) || empty($last_name) || empty($phone) || empty($email) || empty($location))
        {
            echo json_encode(['status'=> 0, 'message'=> "One or more field(s) is empty"]);
            exit;
        }


        // Add to database after validation
        require_once '../../config/controller.php';
        $controller = new Controller();
        $id = $_SESSION['userid'];
        $response = $controller->updateBasicInfo($id, $first_name, $last_name, $phone, $email, $location);
        if($response == "SUCCESS")
        {
            echo json_encode(['status'=> 1, 'message'=> "Profile info updated successfully"]);
            exit;
        }else{
            echo json_encode(['status'=> 0, 'message'=> "Sorry something went wrong. Try again later!"]);
            exit;
        }
    
    }
    // UPDATE PASSWORD
    if(isset($_POST['action']) && $_POST['action'] == 'update_password')
    {
        $current = $_POST['current'];
        $new = $_POST['new'];
        $confirm = $_POST['confirm'];

        if($new !== $confirm)
        {
            echo json_encode(['status'=> 0, 'message'=> "Passwords do not match."]);
            exit;
        }
        

        if(empty($current) || empty($new) || empty($confirm))
        {
            echo json_encode(['status'=> 0, 'message'=> "One or more field(s) is empty"]);
            exit;
        }


        // Add to database after validation
        require_once '../../config/controller.php';
        $controller = new Controller();
        $id = $_SESSION['userid'];
        $response = $controller->changePassword($id, $current, $new);
        if($response == "SUCCESS")
        {
            echo json_encode(['status'=> 1, 'message'=> "Password updated successfully"]);
            exit;
        }else if($response == "INCORRECT"){
            echo json_encode(['status'=> 0, 'message'=> "Current password is not current"]);
            exit;
        }else{
            echo json_encode(['status'=> 0, 'message'=> "Sorry something went wrong. Try again later!"]);
            exit;
        }
    
    }
    // UPDATE IMAGE
    if(isset($_POST['action']) && $_POST['action'] == 'change_photo')
    {
        // $photo = $_FILES['user_image']['name'];

        // if(empty($photo))
        // {
        //     echo json_encode(['status'=> 0, 'message'=> "One or more field(s) is empty"]);
        //     exit;
        // }

        // $target_dir = "../../assets/images/users/";  //directory to store image
        // $target_file = $target_dir . basename($_FILES['user_image']["name"]);
        // $uploadOk = 1;
        // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // // Check if image file is a actual image or fake image
        // $check = getimagesize($_FILES['user_image']["tmp_name"]);
        // if($check !== true) {
        //     echo json_encode( ["status" => 0, "message" => "Sorry photo is not an actual image."] );
        //     $uploadOk = 0;
        //     exit();
    
        // }
        
        // // Check file size
        // if ($_FILES['user_image']["size"] > 500000) {
        //   $msg = "Sorry, your file is too large.";
        //   echo json_encode( ["status" => 0, "message" => $msg] );
        //   $uploadOk = 0;
        // }
        
        // // Allow certain file formats
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        // && $imageFileType != "gif" ) {
        //   $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed for photo.";
        //   echo json_encode( ["status" => 0, "message" => $msg] );
        //   $uploadOk = 0;
        //   exit();
        // }
        
        // // Check if $uploadOk is set to 0 by an error
        // if ($uploadOk == 0) {
        //   $msg = "Sorry, photo upload failed. Try again.";
        //   echo json_encode( ["status" => 0, "message" => $msg] );
        //   exit();
    
    
        // // if everything is ok, try to upload file
        // } else {
        //   if (!move_uploaded_file($_FILES['user_image']["tmp_name"], $target_file)) {
        //     $msg = "Sorry, there was an error uploading your file.";
        //     echo json_encode( ["status" => 0, "message" => $msg] );
        //     exit();
        //   }else{
              
        //     // Add to database after validation
        //     require_once '../../config/controller.php';
        //     $controller = new Controller();
        //     $id = $_SESSION['userid'];
        //     $response = $controller->changeImage($id, $_FILES['user_image']['name']);
        //     if($response == "SUCCESS")
        //     {
        //         echo json_encode(['status'=> 1, 'message'=> "Photo updated successfully"]);
        //         exit;
        //     }else{
        //         echo json_encode(['status'=> 0, 'message'=> "Sorry something went wrong. Try again later!"]);
        //         exit;
        //     }
        //   }
        // }    
        if($_FILES['user_image']['name'] != ''){
            $test = explode('.', $_FILES['user_image']['name']);
            $extension = end($test);    
            $name = rand(100,999).'.'.$extension;
            $target_dir = "../../assets/images/users/";  //directory to store image
            $path = $target_dir.$name;
            move_uploaded_file($_FILES['user_image']['tmp_name'], $path);
            echo json_encode(['status'=> 1, 'message'=> "Image uploaded to $location"]);
        }
    }

    function uplaod_photo($image)
    {
        $target_dir = "../../assets/images/users/";  //directory to store image
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($image["tmp_name"]);
        if($check !== true) {
            echo json_encode( ["status" => 0, "message" => "Sorry photo is not an actual image."] );
            $uploadOk = 0;
            exit();
    
        }
        
        
        // Check file size
        if ($image["size"] > 500000) {
          $msg = "Sorry, your file is too large.";
          echo json_encode( ["status" => 0, "message" => $msg] );
          $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed for photo.";
          echo json_encode( ["status" => 0, "message" => $msg] );
          $uploadOk = 0;
          exit();
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          $msg = "Sorry, photo upload failed. Try again.";
          echo json_encode( ["status" => 0, "message" => $msg] );
          exit();
    
    
        // if everything is ok, try to upload file
        } else {
          if (!move_uploaded_file($image["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $image["name"])). " has been uploaded.";
            $msg = "Sorry, there was an error uploading your file.";
            echo json_encode( ["status" => 0, "message" => $msg] );
            exit();
          }
          else{
              return true;
          }
        }
    }
?>