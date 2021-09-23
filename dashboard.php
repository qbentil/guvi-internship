<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUVI - Internship Project"Dashboard</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- FONT_AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="row my-3 border py-2">
              <div class="col-sm-10"><h5 class="username">@qBentil</h1></div>
            <div class="col-sm-2">
                <a href="" class="logout nav-link"><i class="fa fa-sign-out"></i>Logout</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4 py-3">
                <div class="text-center my-3">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar"><br>
                    <i>Upload a different photo...</i>
                    <div class="form-group">   
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                          <!-- <input type="file" class="custom-file-input" id="inputGroupFile02"> -->
                          <label class="custom-file-label" for="img">Choose file</label>
                          <input type="file" id="img" class="custom-file-input text-center center-block file-upload" />
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                </ul>              
            </div>
            <div class="col-sm-8 col-md-8">
                <ul class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <li> <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a></li>
                    <li ><a class="nav-item nav-link " id="nav-security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="nav-home" aria-selected="true">Security</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form class = "needs-validation" method="post" novalidate>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name">First name</h4></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="last_name">Last name</h4></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any." required>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any." required>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-xs-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." required>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-xs-6">
                                    <label for="email">Location</label>
                                    <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                        <br>
                                        <button class="btn  btn-success" type="submit"><i class="fa fa-check"></i> Save</button>
                                        <button class="btn btn-outline-primary" type="reset"><i class="fa fa-repeat"></i> Reset</button>
                                    </div>
                            </div>
                        </form>                    
                    </div>
                    <div class="tab-pane fade show " class = "needs-validation" id="security" role="tabpanel" aria-labelledby="nav-security-tab">
                        <form class="needs-validation" method="post" novalidate >
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="password">Current Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Current password" title="enter your current password." autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control" name="password" id="new-password" placeholder="New password" title="enter a new password." autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="password2">Verify</label>
                                    <input type="password" class="form-control" name="password2" id="password-confirm" placeholder="Verify Password" title="verify your password." autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                        <br>
                                        <button class="btn  btn-success" type="submit"><i class="fa fa-check"></i> Save</button>
                                        <button class="btn btn-outline-primary" type="reset"><i class="fa fa-repeat"></i> Reset</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>














    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- CUSTOM JS -->
    <script src="./assets/js/core.js"></script>
</body>
</html>