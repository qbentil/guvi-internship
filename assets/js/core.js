// Disable form submissions if there are invalid fields
(function() {
  const signin_form = $("#signin-form");
  const signup_form = $("#signup-form");

  // toggle forms
  $("#hide-login").on("click", function(e)
  {
    e.preventDefault();
    $(signin_form).hide();
    $(signup_form).show();
  })
  $(".hide-signup").on("click", function(e)
  {
    e.preventDefault();
    $(signup_form).hide();
    $(signin_form).show();
  })



  // upload
  var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
  }


  $(".file-upload").on('change', function(){
      readURL(this);
  });

  // File Validation
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
        event.preventDefault();
      }, false);
    });
  }, false);



  // GENERAL FORM HANDLER
  function form_handler(form, action, relative_path = "./") 
  {
      var response = '<div class="alert alert-warning alert-dismissable"> Processing.. </div>';
      $(form).find(".ajax-message").html(response).show('slow');
      var formData  = $(form).serialize();
      var url		=	relative_path+"assets/php/processor.php";
      $.ajax({
          url: url,
          method: 'POST',
          data: formData +'&action='+action,        
      }).done(function(result){
          console.log(result);
          var data = JSON.parse(result)
          if(data.status == 1 && action == 'signin')
          {
            location.href = './dashboard/';

          }else{
            if(data.status == 1)
            {
              response = '<div class="err alert alert-success">'+data.message+'</div>';
              $(form).reset();

            }else{
              response = '<div class="err alert alert-danger">'+data.message+'</div>';
            }
          }
          $(form).find(".ajax-message").html(response).delay(5000).hide('slow');
      })
  }
  function image_form(form)
  {
      var response = '<div class="alert alert-warning alert-dismissable"> Processing.. </div>';
      var hasError = false;
      $(form).find(".ajax-message").html(response).show('slow');
      var property = $("#user_image")[0];
      var image_name = property.value;
      var image_extension = image_name.split('.').pop().toLowerCase();
      console.log(image_extension);
      if(jQuery.inArray(image_extension,['gif','jpg','jpeg','png']) == -1){
        response = '<div class="alert alert-danger alert-dismissable"> Invalid image file type. </div>'
        $(form).find(".ajax-message").html(response).delay(5000).hide('slow');
        hasError = true;
      }
      if(!hasError)
      {
        // var formData = new FormData();
        var url		=	"../assets/php/processor.php";
        // formData.append("file",property);
        var formData  = $(form).serialize();
        $.ajax({
          url:url,
          type:'POST',
          data:formData+'&action=change_photo',
          contentType:false,
          cache:false,
          processData:false,
          beforeSend:function(){
            response = '<div class="alert alert-warning alert-dismissable"> Loading...... </div>';
            $(form).find(".ajax-message").html(response).show('slow');
          },
          success:function(data){
            console.log(data);
            // $('#msg').html(data);
          }
        });
      }
  }



  // Creating New Account
  $("#signup-form").submit(function(e)
  {
      e.preventDefault();
      let form = $(this), action = 'signup'
      form_handler(form, action);
  })

  // User Login
  $("#signin-form").submit(function(e)
  {
    e.preventDefault();
    let form = $(this), action = 'signin'
    form_handler(form, action);
  })

  $("#update_profile").submit(function(e)
  {
    e.preventDefault();
    let form = $(this), action = 'update_profile'
    form_handler(form, action, "../");
  })
  $("#change_password").submit(function(e)
  {
    e.preventDefault();
    let form = $(this), action = 'update_password'
    form_handler(form, action, "../");
  })
  
  $("#user_image").change(function(e)
  {
    e.preventDefault();
    let form = $("#update_photo")
    image_form(form)
  })
  

  
})();
