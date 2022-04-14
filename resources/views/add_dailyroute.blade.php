@include('header')
<script type="text/javascript">
  $(document).ready(function() {
      // $("#submit_botton").hide();
  });
  </script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Daily Route</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Daily Route</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <input type="hidden" id="msg_show" name="msg_show" value="">
    <div class="col-md-6">
<button type="button" id="alert_true" class="btn btn-default toastsDefaultAutohideinfo">
                  info alert
                </button>
                 <button type="button" id="alert_false" class="btn btn-default dangeralert">
                  danger alert
                </button>
                </div>
  <script>
   $(document).ready(function() {
    $("#alert_true").hide();
     $("#alert_false").hide();
   
    
});
   </script>
  <script>
  $(function() {
    
    $('.toastsDefaultAutohideinfo').click(function() {
        var msg= $('#msg_show').val();
      $(document).Toasts('create', {

        class: 'bg-info ',
        title: msg,
        //position:'',
        autohide: true,
        delay: 2000
        // body: 'User Activated'
      })
    });


        $('.dangeralert').click(function() {
            var msg = $('#msg_show').val();
      $(document).Toasts('create', {
        class: 'bg-danger ',
        title: msg,
        //position:'',
        autohide: true,
        delay: 2000
        // body: 'User Deactivated'
      })
    });


  });
</script>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="form-row">

                                <div class="form-group col-md-4 text-center">
                                    @include('messages')
                                    <label class="">Add Daily Route Banner Image <span class="text-danger">*</span></label>
                                    <div class="phto-set border pt-2 pb-2 text-center" style="height: 150px;">
                                        <!-- <div class="phto-set border pt-2 pb-2 text-center" style="height: 150px;"> -->
                                        <label for="banner-img"><img src="<?php echo url('/') ?>/dist/img/photo.png" id="thumbnil"
                                                style="max-width:100%; max-height: 150px;"></label>
                                        <form method="post">
                                            <div class="set-label">
                                                <label for="banner-img"><i class="fa fa-camera"></i></label>
                                            </div>
                                    </div>
                                    <input type="file" id="banner-img" name="banner_img" accept="image/*" onchange="showMyImage(this)"
                                        style="display: none;">
                                    <div class="centered-txt text-center" id="done" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                id="loader" style="max-width:12%;display: none"></label></div>
                                </div>
                                <script>
                                    function showMyImage(fileInput) {
                                        var files = fileInput.files;
                                        for (var i = 0; i < files.length; i++) {
                                            var file = files[i];
                                            var imageType = /image.*/;
                                            if (!file.type.match(imageType)) {
                                                continue;
                                            }
                                            var img = document.getElementById("thumbnil");
                                            img.file = file;
                                            var reader = new FileReader();
                                            reader.onload = (function(aImg) {
                                                return function(e) {
                                                    aImg.src = e.target.result;
                                                };
                                            })(img);
                                            reader.readAsDataURL(file);
                                        }
                                    }

                                </script>
                                <div class="form-group col-md-4 text-center">
                                    <label class="text-center">Add Daily Route Map Image <span class="text-danger">*</span></label>
                                    <div class="phto-set border pt-2 pb-2 text-center">
                                        <label for="map-img"><img src="<?php echo url('/') ?>/dist/img/photo.png" id="thumbnil2"
                                                style="max-width:100%; max-height: 120px;"></label>
                                        <div class="set-label">
                                            <label for="map-img"><i class="fa fa-camera"></i></label>
                                        </div>
                                    </div>
                                    <input type="file" id="map-img" accept="image/*" name="map_img" onchange="showMyImage2(this)"
                                        style="display: none;">
                                    <div class="centered-txt text-center" id="done2" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                id="loader2" style="max-width:12%;display: none"></label></div>
                                </div>
                                <script>
                                    function showMyImage2(fileInput) {
                                        var files = fileInput.files;
                                        for (var i = 0; i < files.length; i++) {
                                            var file = files[i];
                                            var imageType = /image.*/;
                                            if (!file.type.match(imageType)) {
                                                continue;
                                            }
                                            var img = document.getElementById("thumbnil2");
                                            img.file = file;
                                            var reader = new FileReader();
                                            reader.onload = (function(aImg) {
                                                return function(e) {
                                                    aImg.src = e.target.result;
                                                };
                                            })(img);
                                            reader.readAsDataURL(file);
                                        }
                                    }

                                </script>
                            </div>
                             <small id="emailHelp" class="form-text text-muted">(Add Image with 16:9  such as  w:1920px X h:1080px )</small>
                        </div>
                        <div class="card-footer">



                            <div class="form-group col-md-6">
                                <label> Daily Route Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="trip_type" name="trip_type">
                                    <option value=""> Choose Type</option>
                                    <option value="0">Clockwise</option>
                                    <option value="1">Anticlockwise</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label> Choose Language <span class="text-danger">*</span></label>
                                <select class="form-control" id="colorselector">
                                    <!-- <option value="">Select Language</option> -->
                                    <option value="english" selected="">English</option>
                                    <!-- <option value="french">French</option>
                                    <option value="german">German</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card language" id="japan" style="display: none" class="size_chart">
                        <form method="post" action="{{ route('do_add_daily_route') }}">

                        </form>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <form method="post" id="en" action="{{ route('do_add_daily_route') }}">
                        
                        <div class="card languages" id="english" class="size_chart">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="image_hidden1" value="">
                            <input type="hidden" name="image_hidden2" value="">

                            <input type="hidden" name="audio_hidden1" value="">
                            <input type="hidden" name="audio_hidden2" value="">
                            <input type="hidden" name="audio_hidden3" value="">
                            <input type="hidden" name="form" value="en">
                            <input type="hidden" name="trip_type_hidden" value="">
                            <input type="hidden" name="lan_hidden" value="">
                            <div class="card-header bg-dark">

                                <h5 class="card-Add Daily Route Title">English</h5>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Add Daily Route Audio <i class="fa fa-music"></i> <span class="text-danger">*</span></label> <br>
                                    <label for="en-audio" class="btn btn-info">Upload <i
                                            class="fa fa-upload"></i></label>
                                    <input id="en-audio" accept="audio/x-m4a" type="file" name="en_fileAudio" value=""
                                        style="display: none;" />
                                    <small id="emailHelp" class="form-text text-muted">(Accept Only M4A Audio Maximum Size 5 MB)</small>

                                     <div class="centered-txt text-left" id="done3" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="d-flex justify-content-left"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                id="loader3" style="max-width:12%;display: none"></label></div>

                                </div>
                                <div class="form-group">
                                    <label>Add Daily Route Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Add Daily Route Title"
                                        maxlength="100" name="en_title">
                                        <small>(Maximum 100 Characters)</small> 
                                </div>

                                <div class="form-group">
                                    <label>Daily Route Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="en_des" rows="6"
                                        placeholder="Daily Route Description "
                                        maxlength="2000"></textarea>
                                     <small>(Maximum 2000 Characters)</small>   
                                </div>


                            </div>

                        </div>

                        <div class="card language" id="french" class="size_chart">

                           
                            <div class="card-header bg-dark">

                                <h5 class="card-Add Daily Route Title">French</h5>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Add Daily Route Audio <i class="fa fa-music"></i> <span class="text-danger">*</span></label> <br>
                                    <label for="fr-audio" class="btn btn-info">Upload <i
                                            class="fa fa-upload"></i></label>
                                    <input id="fr-audio" accept=".m4a" type="file" name="fr_fileAudio" value=""
                                        style="display: none;" />
                                    <small id="emailHelp" class="form-text text-muted">(Accept Only M4A Audio Maximum Size 5 MB)</small>

                                     <div class="centered-txt text-center" id="done4" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                id="loader4" style="max-width:12%;display: none"></label></div>

                                </div>
                                <div class="form-group">
                                    <label>Add Daily Route Title</label>
                                    <input type="text" class="form-control" placeholder="Add Daily Route Title"
                                        maxlength="120" name="fn_title">
                                </div>

                                <div class="form-group">
                                    <label>Daily Route Description</label>
                                    <textarea class="form-control" id="fn_des" name="fr_des" rows="2"
                                        placeholder="Daily Route Description (Maximum 200 Characters)"
                                        maxlength="200"></textarea>
                                </div>


                            </div>


                        </div>

                        <div class="card language" id="german" class="size_chart">

                            

                            <div class="card-header bg-dark">
                                <h5 class="card-title">German</h5>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Add Daily Route Audio <i class="fa fa-music"></i> </label> <br>
                                    <label for="de-audio" class="btn btn-info">Upload <i
                                            class="fa fa-upload"></i></label>
                                    <input id="de-audio" accept=".m4a" type="file" name="de_fileAudio" value=""
                                        style="display: none;" />
                                    <small id="emailHelp" class="form-text text-muted">(Accept Only M4A Audio)</small>

                                     <div class="centered-txt text-center" id="done5" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                id="loader5" style="max-width:12%;display: none"></label></div>

                                    <audio controls="controls" id="audioPreview3" style="display:none">
                                        <source src="" type="audio/m4a" />
                                    </audio>
                                </div>
                                <div class="form-group">
                                    <label>Titel</label>
                                    <input type="text" class="form-control" placeholder="Titel hinzufügen"
                                        maxlength="120" name="de_title">
                                </div>

                                <div class="form-group">
                                    <label>Daily Route Description</label>
                                    <textarea class="form-control" id="de_des" name="de_des" rows="2"
                                        placeholder="Daily Route Description (Maximum 200 Characters)"
                                        maxlength="200"></textarea>
                                </div>


                            </div>
                        </div>
                        <div class="card-footer">
                          <!--   <button type="submit" class="btn btn-secondary w-100" id="submit_botton"
                                name="de" style="display: none">Submit</button> -->
                                <button type="submit" class="btn btn-secondary w-100" id="submit_botton"
                                name="de" >Submit</button>
                        </div>

                    </form>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            // $("#submit_botton").hide();
                        });
                        $(function() {
                            $("#colorselector").change(function() {
                                var lan_val = $(this).val();
                                $("input[name='lan_hidden']").val(lan_val);
                                $(".language").hide();
                                $("#" + $(this).val()).show();
                                $("#submit_botton").show();
                            });
                        });

                    </script>
                    <style type="text/css">
                        .language {
                            display: none;
                        }
                        
                    </style>

                </div>
            </div>


            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $('#trip_type').change(function() {
        var trip_type_val = $(this).val();
        if (trip_type_val === '') {
            $("input[name='trip_type_hidden']").val('');
        }else{
            $("input[name='trip_type_hidden']").val(trip_type_val);
        }
        
    });

</script>
<script>
    $("#en").submit(function() {
        var image_hidden1 = $("input[name='image_hidden1']").val();
        var image_hidden2 = $("input[name='image_hidden2']").val();
        var trip_type_hidden = $("input[name='trip_type_hidden']").val();
        if (image_hidden1 === '' || image_hidden2 === '') {
           
            
            $('#msg_show').val('Please Add An Image');
            $("#alert_false").click();
            return false;
        }
        if (trip_type_hidden === '') {
           
          
            $('#msg_show').val('Please Select Route type');
            $("#alert_false").click();
            return false;
        }

        // var form_val = $("input[name='form']").val();
        // if (form_val=='en') {
        //   var audio_hidden1 = $("input[name='audio_hidden1']").val();
        //   if (audio_hidden1 === '') {
        //     alert('Please add audio file');
        //     return false;
        // }
        // }

        // if (form_val=='fr') {
        //   var audio_hidden2 = $("input[name='audio_hidden2']").val();
        //   if (audio_hidden2 === '') {
        //     alert('Please add audio file');
        //     return false;
        // }
        // }

        // if (form_val=='de') {
        //   var audio_hidden3 = $("input[name='audio_hidden3']").val();
        //   if (audio_hidden3 === '') {
        //     alert('Please add audio file');
        //     return false;
        // }
        // }

    });

</script>
<script>
    $('#submit_botton').click(function() {
        var lan_hidden = $("input[name='lan_hidden']").val();

        var en_title = $("input[name='en_title']").val();
        var en_des = $("textarea[name='en_des']").val();
        var audio_hidden1 = $("input[name='audio_hidden1']").val();

        var fr_title = $("input[name='fr_title']").val();
        var fr_des = $("textarea[name='fr_des']").val();
        var audio_hidden2 = $("input[name='audio_hidden2']").val();

        var de_title = $("input[name='de_title']").val();
        var de_des = $("textarea[name='de_des']").val();
        var audio_hidden3 = $("input[name='audio_hidden3']").val();
        
        if (lan_hidden === 'english' ) {
            
            if (audio_hidden1 === '' || en_des === '' || en_title === '') {

               $('#msg_show').val('you must fill the english form');
                //$("#alert_false").html('you must fill the english form');
                $("#alert_false").click();
                 return false;

            }
                
            
            
        } 

        if (lan_hidden === 'french' ) {
            
            if (fr_des === '' ) {

             
                $('#msg_show').val('you must fill the french form');
                $("#alert_false").click();
                 return false;

            }
                
            
            
        }

        if (lan_hidden === 'german' ) {
            
            if (audio_hidden3 === '' || de_des === '' || de_title === '') {

             
                $('#msg_show').val('you must fill the german form');
                $("#alert_false").click();
                 return false;

            }
                
            
            
        } 

        if (audio_hidden1 === '' || en_des === '' || en_title === '') {
           
            $('#msg_show').val('you must fill the english form');
            $("#alert_false").click();
            return false;
        } 
    });

</script>







<script type="text/javascript">
    $("#banner-img").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=banner-img]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        $.ajax({
            url: '{{ route('add_image') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader").show();
            },
            success: function(response) {
                var image_name = response['image'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader").hide();
                    $("input[name='image_hidden1']").val(image_name);

                } else {
                    
                       

                     $('#msg_show').val(image_name);
               
                     $("#alert_false").click();
                
                    $("#loader").hide();
                    $('#done').hide();
                }

            },
            error: function() {
                $("#loader").hide();
                $('#done').hide();
                $('#msg_show').val('Try with an valid image.');
                $("#alert_false").click();
            }
        });
    });

</script>
<script type="text/javascript">
    $("#map-img").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=map-img]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        $.ajax({
            url: '{{ route('add_image') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader2").show();
            },
            success: function(response) {
                var image_name = response['image'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done2').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader2").hide();
                    $("input[name='image_hidden2']").val(image_name);

                } else {
                    $('#msg_show').val(image_name);
               
                     $("#alert_false").click();
                
                    $("#loader2").hide();
                    $('#done2').hide();
                }



                /*var baseUrl = "{{ asset('') }}";
                var imageUrl = baseUrl + data.msg;
                $('#changeimage').html('<img src="'+ imageUrl +'" height="120px" width="150px">');*/
            },
            error: function() {
                $("#loader2").hide();
                $('#done2').hide();
            }
        });
    });

</script>

{{-- fro only audio upload --}}

<script type="text/javascript">
    $("#en-audio").change(function(e) {
        var data = new FormData();
        data.append('audio', $('input[id=en-audio]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        $.ajax({
            url: '{{ route('add_audio') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader3").show();
            },
            success: function(response) {
                var image_name = response['audio'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done3').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader3").hide();
                    $("input[name='audio_hidden1']").val(image_name);
                   $('#msg_show').val('English audio uploaded successfully.');
               
                     $("#alert_true").click();
                } else {
                    $('#msg_show').val(image_name);
               
                     $("#alert_false").click();
                    $("#loader3").hide();
                    $('#done3').hide();
                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(errors) {
                    $('#msg_show').val(errors);
               
                     $("#alert_false").click();
                $("#loader3").hide();
                $('#done3').hide();
                })
            }
        });
    });

</script>

<script type="text/javascript">
    $("#fr-audio").change(function(e) {
        var data = new FormData();
        data.append('audio', $('input[id=fr-audio]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        $.ajax({
            url: '{{ route('add_audio') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader4").show();
            },
            success: function(response) {
                var image_name = response['audio'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done4').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader4").hide();
                    $("input[name='audio_hidden2']").val(image_name);
                    $('#msg_show').val('French audio uploaded successfully.');
               
                     $("#alert_true").click();
                } else {
                    $(document).find('[name=fr_fileAudio]').after(
                        '<span class="text-strong textdanger">' + image_name + '</span>')

                    $('#done4').hide();
                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(errors) {
                    $('#msg_show').val(errors);
               
                     $("#alert_false").click();
                      $("#loader4").hide();
                      $('#done4').hide();
                })
            }
        });
    });

</script>

<script type="text/javascript">
    $("#de-audio").change(function(e) {
        var data = new FormData();
        data.append('audio', $('input[id=de-audio]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        $.ajax({
            url: '{{ route('add_audio') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader5").show();
            },
            success: function(response) {
                var image_name = response['audio'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done5').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader5").hide();
                    $("input[name='audio_hidden3']").val(image_name);
                    $('#msg_show').val('German audio uploaded successfully.');
               
                     $("#alert_true").click();
                } else {
                    $(document).find('[name=de_fileAudio]').after(
                        '<span class="text-strong textdanger">' + image_name + '</span>')
                    $('#done5').hide();
                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(errors) {
                    $('#msg_show').val(errors);
               
                     $("#alert_false").click();
                      $("#loader5").hide();
                })
            }
        });
    });

</script>

{{--  --}}
@include('footer')
