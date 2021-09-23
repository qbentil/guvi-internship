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



  // CONSTANTS
  function form_handler(form, action) 
  {
      var response = '<div class="alert alert-warning alert-dismissable"> Processing.. </div>';
      $(form).find(".ajax-message").html(response).show('slow');
      var formData  = $(form).serialize();
      var url		=	"./assets/php/processor.php";
      $.ajax({
          url: url,
          method: 'POST',
          data: formData +'&action='+action,        
      }).done(function(result){
          console.log(result);
          var data = JSON.parse(result)
          if(data.status == 1)
          {
              response = '<div class="gen alert alert-success">'+data.message+'</div>';
              // form[0].reset();
          }else{
            if(action == 'signup')
            {
              response = '<div class="err alert alert-danger">'+data.message+'</div>';
            }else{
              location.href = 'dashboard.php';
            }
          }
          $(form).find(".ajax-message").html(response).show('slow');
      })
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

  

  
})();

