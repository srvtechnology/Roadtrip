<!DOCTYPE html>
<html lang="en">
<head>
	<title>Road Trip 2.0</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	
   <link rel="shortcut icon" href="<?php echo url('/');  ?>/email_css/images/title_icon.png" type="image/x-icon">
<!--===============================================================================================-->	
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('/');  ?>/email_css/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('/');  ?>/email_css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('/');  ?>/email_css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('/');  ?>/email_css/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo url('/');  ?>/email_css/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('/');  ?>/email_css/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('/');  ?>/email_css/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo url('/');  ?>/email_css/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo url('/');  ?>/dist/css/loader.css">
<!--===============================================================================================-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script>
	 $(document).ready(function() {
    $("#thank_you").hide();
     $("#loader-wrapper").hide();
     $("#show").hide();
    
});
	 </script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo url('/');  ?>/email_css/images/background.jpg');">
			 <div style="display: none;" id="loader-wrapper">
                            <div id="loader"></div>
                            </div>
			<div class="wrap-login100 p-t-50 p-b-30" id="form">
				<form class="login100-form validate-form" id="update_form" method="POST">
					<!-- <div class="login100-form-avatar">
						<img src="images/profile.svg" alt="AVATAR">
					</div> -->
					<input type="hidden" name="lc" value="{{@$lc}}">

					<span class="login100-form-title p-t-20 p-b-45">
						@if($lc=="en")
						Update Your Password {{-- <br> {{$lc}} --}}

						@elseif($lc=="fr")
						Réinitialiser le mot de passe {{-- <br> {{$lc}} --}}

						@elseif($lc=="de")
						Aktualisiere dein Passwort {{-- <br> {{$lc}} --}}

						@else
						Update Your Password {{-- <br> {{$lc}} --}}

						@endif
						
					</span>

					<div style="padding: 8px; border-radius: 4px; font-size: 14px; display: none;" id="show" class=" bg-danger w-100 text-light mb-2 text-center"></div>
					<!-- <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="E-mail" value="" readonly="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope-o"></i>
						</span>
					</div> -->

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" @if($lc=="en") placeholder="New Password" @elseif($lc=="fr") placeholder="Nouveau mot de passe"  @elseif($lc=="de") placeholder="Neues Passwort"  @else  placeholder="New Password" @endif minlength="8" maxlength="50">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="confirm_password"  @if($lc=="en") placeholder="Confirm Password" @elseif($lc=="fr") placeholder="Confirmer mot de passe"  @elseif($lc=="de") placeholder="Passwort bestätigen"  @else  placeholder="Confirm Password" @endif minlength="8" maxlength="50">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					
					<input type="hidden" name="user_email" value="{{$email}}">

				
					
					<div class="container-login100-form-btn p-t-10">
						<span style="cursor: pointer;" class="login100-form-btn"  id="update"> 
						@if($lc=="en")
						 Update Password 
						@elseif($lc=="fr") 
						Réinitialiser mot de passe


						@elseif($lc=="de")
						Passwort aktualisieren


						@else 
						Update Password

						@endif  </span>
					</div>

					
				</form>
			</div>
			<div style="display: none;" id="thank_you" class="text-center">
				<div class="success-img mb-4">
					<img style="width: 100px; margin: auto;" src="<?php echo url('/');  ?>/email_css/images/tick.png">
				</div>
				<p style="color: #ffffff; font-weight: bold;" id="msg"></p>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo url('/');  ?>/email_css/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo url('/');  ?>/email_css/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo url('/');  ?>/email_css/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo url('/');  ?>/email_css/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo url('/');  ?>/email_css/js/main.js"></script>


</body>
<script>
	 $(document).ready(function() {
    $("#thank_you").hide();
     $("#loader-wrapper").hide();
     $("#show").hide();
    
});
	 </script>
<script>

    $("#update").on("click", function() {

        // var product_id = $('input[name="product_id"]').val();
     var formData = $("#update_form").serializeArray();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({


            type: "POST",
            url: "{{route('update_password')}}",
            data: formData,
            beforeSend: function() {
               $("#loader-wrapper").show();
            },
            success: function(response) {
            	$("#loader-wrapper").hide();
             var flag = response['flag'];
                var message = response['message'];

             if (flag=='true') {
                 $("#form").hide();
                 //$("#checkout").submit();
                 $("#loader-wrapper").hide();
                 $("#thank_you").show();

                 if(response["lc"]=="en"){
                 	$("#msg").text('THANK YOU, YOUR PASSWORD HAS BEEN SUCCESSFULLY UPDATED !');

                 }
                 else if(response["lc"]=="fr"){
                 	$("#msg").text("Merci - vortre mot de passe a été mis à jour avec succès!");

                 }
                  else if(response["lc"]=="de"){
                  	$("#msg").text("Vielen Dank - dein Passwort wurde erfolgreich geändert!");
                 	
                 }
                 else{
                 	$("#msg").text('THANK YOU, YOUR PASSWORD HAS BEEN SUCCESSFULLY UPDATED !');

                 }
//                  $(function () { 
//    setTimeout("window.close();", 3000);
// });
                 
             }else{
                 //alert(message)
                  $("#show").show();
                 $("#show").html(message);

                 $("#loader-wrapper").hide();
                 $(function () { 
    var duration = 2000; // 4 seconds
    // setTimeout(function () { $('#show').hide(); }, duration);
  $("#show").show("slow").delay(2000).hide("slow");
});
                  
             }   
            
            
                  
             }

            


        });
        

    });

</script>
</html>
