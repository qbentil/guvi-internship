<?php

if($_FILES['user_image']['name'] != ''){
    $test = explode('.', $_FILES['user_image']['name']);
    $extension = end($test);    
    $name = rand(100,999).'.'.$extension;
    $target_dir = "../../assets/images/users/";  //directory to store image
    $path = $target_dir.$name;
    if(move_uploaded_file($_FILES['user_image']['tmp_name'], $path))
    {
        // Add to database after validation
        require_once '../../config/controller.php';
        $controller = new Controller();
        $id = $_SESSION['userid'];
        $response = $controller->changeImage($id, $name);
        if($response == "SUCCESS")
        {
            echo json_encode(['status'=> 1, 'message'=> "Profile Picture Updated Successfully."]);
            exit;
        }elseif ($response == "FAILED") {
            echo json_encode(['status'=> 0, 'message'=> "Profile Picture Update Failed"]);
            exit;
        }else{
            echo json_encode(['status'=> 0, 'message'=> "Sorry something went wrong. Try again later!"]);
            exit;
        }
    }
    echo json_encode(['status'=> 1, 'message'=> "Image uploaded failed. Please try again."]);
    exit;
}else{
    echo json_encode(['status'=> 0, 'message'=> "Image Not Found"]);
}