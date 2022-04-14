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
				
					<!-- <div class="login100-form-avatar">
						<img src="images/profile.svg" alt="AVATAR">
					</div> -->

					<span class="login100-form-title p-t-20 p-b-45">
						The link expired.
					</span>

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
