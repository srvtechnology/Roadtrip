@include('header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h1>Add Point Of Interest</h1>
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
                    <div class="crad">

                        <div class="card-body">
                            
                            <form method="POST" class="mt-2">
                                <input type="hidden" name="from_add_poi" value="from_add_poi" />
                                <div class="flex-area">
                                   
                                        
                                        <div class="phto-set border p-2 text-center">
                                            <label for="place_1"><img style="max-width:100%; max-height: 120px;"
                                                    src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil"></label>
                                            <input type="file" id="place_1" onchange="showMyImage(this)" accept="image/*" name="place1"
                                                style="display: none;">



                                            <div class="set-label">
                                                <label for="place_1"><i class="fa fa-camera"></i></label>
                                            </div>
                                         

                                         <div class="centered-txt text-center mb-2" id="done" style="display:none; font-size: 14px;"><i
                                                class="fa fa-check-circle"></i> &nbsp; Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader" style="max-width:12%;display: none"></label></div>
                                        </div>
                                        
                                   
                                          
                                        <div class="phto-set border p-2 text-center">
                                            <label for="place_2"><img style="max-height: 120px; max-width: 100%;"
                                                    src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil2"></label>
                                            <input type="file" accept="image/*" id="place_2" onchange="showMyImage2(this)" name="place2"
                                                style="display: none;">



                                            <div class="set-label">
                                                <label for="place_2"><i class="fa fa-camera"></i></label>
                                            </div>

                                             <div class="centered-txt text-center" id="done2" style="display:none; font-size: 14px;"><i
                                                class="fa fa-check-circle"></i> &nbsp;Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader2" style="max-width:12%;display: none"></label></div>
                                        </div>
                                       
                                    
                                   
                                       
                                        <div class="phto-set border p-2 text-center">
                                            <label for="place_3"><img style="max-height: 120px; max-width: 100%;"
                                                    src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil3"></label>
                                            <input type="file" accept="image/*" id="place_3" onchange="showMyImage3(this)" name="place3"
                                                style="display: none;">



                                            <div class="set-label">
                                                <label for="place_3"><i class="fa fa-camera"></i></label>
                                            </div>

                                             <div class="centered-txt text-center" id="done3" style="display:none; font-size: 14px;"><i
                                                class="fa fa-check-circle"></i> &nbsp; Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader3" style="max-width:12%;display: none"></label></div>
                                        </div>
                                       
                                   
                                   
                                         
                                        <div class="phto-set border p-2 text-center">
                                            <label for="place_4"><img style="max-height: 120px; max-width: 100%;"
                                                    src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil4"></label>
                                            <input type="file" accept="image/*" id="place_4" onchange="showMyImage4(this)" name="place4"
                                                style="display: none;">



                                            <div class="set-label">
                                                <label for="place_4"><i class="fa fa-camera"></i></label>
                                            </div>

                                             <div class="centered-txt text-center" id="done4" style="display:none; font-size: 14px;"><i
                                                class="fa fa-check-circle"></i>&nbsp;Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader4" style="max-width:12%;display: none"></label></div>
                                        </div>
                                       
                                   



                                    <!-- Additional images -->
                                   
                                         
                                        <div class="phto-set border p-2 text-center">
                                            <label for="place_5"><img style="max-height: 120px; max-width: 100%;"
                                                    src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil5"></label>
                                            <input type="file" accept="image/*" id="place_5" onchange="showMyImage5(this)" name="place5"
                                                style="display: none;">



                                            <div class="set-label">
                                                <label for="place_5"><i class="fa fa-camera"></i></label>
                                            </div>

                                               <div class="centered-txt text-center" id="done5" style="display:none; font-size: 14px;"><i
                                                class="fa fa-check-circle"></i>&nbsp;Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader5" style="max-width:12%;display: none"></label></div>
                                        </div>
                                     
                                    
                                </div>
                                <div class="flex-area">
                                    
                                         
                                        <div class="phto-set border p-2 text-center">
                                            <label for="place_6"><img style="max-height: 120px; max-width: 100%;"
                                                    src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil6"></label>
                                            <input type="file" accept="image/*" id="place_6" onchange="showMyImage6(this)" name="place6"
                                                style="display: none;">



                                            <div class="set-label">
                                                <label for="place_6"><i class="fa fa-camera"></i></label>
                                            </div>

                                            <div class="centered-txt text-center" id="done6" style="display:none; font-size: 14px;"><i
                                                class="fa fa-check-circle"></i>&nbsp;Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader6" style="max-width:12%;display: none"></label></div>
                                        </div>
                                        
                                   
                                    
                                         
                                        <div class="phto-set border p-2 text-center">
                                            <label for="place_7"><img style="max-height: 120px; max-width: 100%;"
                                                    src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil7"></label>
                                            <input type="file" accept="image/*" id="place_7" onchange="showMyImage7(this)" name="place7"
                                                style="display: none;">



                                            <div class="set-label">
                                                <label for="place_7"><i class="fa fa-camera"></i></label>
                                            </div>

                                             <div class="centered-txt text-center" id="done7" style="display:none; font-size: 14px;"><i
                                                class="fa fa-check-circle"></i>&nbsp;Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader7" style="max-width:12%;display: none"></label></div>
                                        </div>
                                       
                                   
                                   
                                         
                                        <div class="phto-set border p-2 text-center">
                                            <label for="place_8"><img style="max-height: 120px; max-width: 100%;"
                                                    src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil8"></label>
                                            <input type="file" accept="image/*" id="place_8" onchange="showMyImage8(this)" name="place8"
                                                style="display: none;">



                                            <div class="set-label">
                                                <label for="place_8"><i class="fa fa-camera"></i></label>
                                            </div>

                                             <div class="centered-txt text-center" id="done8" style="display:none; font-size: 14px;"><i
                                                class="fa fa-check-circle"></i>&nbsp;Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader8" style="max-width:12%;display: none"></label></div>
                                        </div>
                                       
                                   
                                    
                                         
                                        <div class="phto-set border p-2 text-center">
                                            <label for="place_9"><img style="max-height: 120px; max-width: 100%;"
                                                    src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil9"></label>
                                            <input type="file" accept="image/*" id="place_9" onchange="showMyImage9(this)" name="place9"
                                                style="display: none;">



                                            <div class="set-label">
                                                <label for="place_9"><i class="fa fa-camera"></i></label>
                                            </div>

                                            <div class="centered-txt text-center" id="done9" style="display:none; font-size: 14px;"><i
                                                class="fa fa-check-circle"></i>&nbsp;Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader9" style="max-width:12%;display: none"></label></div>
                                        </div>
                                        
                                   
                                  
                                         
                                        <div class="phto-set border p-2 text-center">
                                            <label for="place_10"><img style="max-height: 120px; max-width: 100%;"
                                                    src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil10"></label>
                                            <input type="file" accept="image/*" id="place_10" onchange="showMyImage10(this)" name="place10"
                                                style="display: none;">



                                            <div class="set-label">
                                                <label for="place_10"><i class="fa fa-camera"></i></label>
                                            </div>

                                            <div class="centered-txt text-center" id="done10" style="display:none; font-size: 14px;"><i
                                                class="fa fa-check-circle"></i>&nbsp;Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader10" style="max-width:12%;display: none"></label></div>
                                        </div>
                                        
                                   
                                </div>
                            </form>
                             <small id="emailHelp" class="form-text text-muted">(Add Image with 16:9  such as  w:1920px X h:1080px )</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="card-header bg-dark">
                        <h5 class="card-title">English</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('do_add_point_of_interest') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <input type="hidden" name="image_hidden1" value="">
                            <input type="hidden" name="image_hidden2" value="">
                            <input type="hidden" name="image_hidden3" value="">
                            <input type="hidden" name="image_hidden4" value="">

                            <input type="hidden" name="image_hidden5" value="">
                            <input type="hidden" name="image_hidden6" value="">
                            <input type="hidden" name="image_hidden7" value="">
                            <input type="hidden" name="image_hidden8" value="">
                            <input type="hidden" name="image_hidden9" value="">
                            <input type="hidden" name="image_hidden10" value="">

                            <input type="hidden" name="audio_hidden1" value="">
                            <input type="hidden" name="audio_hidden2" value="">
                            <input type="hidden" name="audio_hidden3" value="">
                            
                            <input type="hidden" name="route_id" value="{{ $route_id }}">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                    <div class="form-group">
                                        <label>POI Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" maxlength="100" placeholder="Place Name"
                                            name="en_place_name" required>
                                            <small>(Maximum 100 Characters)</small> 
                                    </div>
                                    <div class="form-group">

                                        <label>Add Point Of Interest Audio <i class="fa fa-music"></i> <span class="text-danger">*</span></label><br>
                                        <label for="en-audio" class="btn btn-info">Upload <i
                                                class="fa fa-upload"></i></label>

                                        <input id="en-audio" type="file" accept="audio/x-m4a" name="en_fileAudio" value=""
                                           style="display: none;" />
                                        <small id="emailHelp" class="form-text text-muted">(Accept Only M4A Audio Maximum Size 5 MB)</small>

                                        <div class="centered-txt text-left" id="done_audio" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="d-flex justify-content-left"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                id="audio_loader" style="max-width:12%;display: none"></label></div>
                                    </div>
                                    <div class="form-group">
                                        <label>POI Description  <span class="text-danger">*</span></label>
                                        <textarea class="form-control" placeholder="Description" maxlength="2000" name="en_place_des"
                                            rows="6" required></textarea>
                                            <small>(Maximum 2000 Characters)</small> 
                                    </div>
                                </div>
                            </div>

                    </div>

                </div>

            </div>
        </div>

        
       

                    <div class="card-footer">
                        <button class="btn btn-secondary w-100" id="submit_botton" type="submit">Submit</button>
                    </div>
                    </form>
                </div>

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
    $('#submit_botton').click(function() {



        var audio_hidden1 = $("input[name='audio_hidden1']").val();

        var audio_hidden2 = $("input[name='audio_hidden2']").val();

        var audio_hidden3 = $("input[name='audio_hidden3']").val();

       

        var image_hidden1 = $("input[name='image_hidden1']").val();

        var image_hidden2 = $("input[name='image_hidden2']").val();

        var image_hidden3 = $("input[name='image_hidden3']").val();

        var image_hidden4 = $("input[name='image_hidden4']").val();

        var image_hidden5 = $("input[name='image_hidden5']").val();
        var image_hidden6 = $("input[name='image_hidden6']").val();
        var image_hidden7 = $("input[name='image_hidden7']").val();
        var image_hidden8 = $("input[name='image_hidden8']").val();
        var image_hidden9 = $("input[name='image_hidden9']").val();
        var image_hidden10 = $("input[name='image_hidden10']").val();



        // if (audio_hidden1 === '' || audio_hidden2 === '' || audio_hidden3 === '' ) {
            if (audio_hidden1 === ''  ) {

           
            // $('#msg_show').val('You must upload all audio file');
            $('#msg_show').val('You must upload audio file');
            $("#alert_false").click();
            return false;

        }

        //if (image_hidden1 === '' || image_hidden2 === '' || image_hidden3 === '' || image_hidden4 === '') {
        if (image_hidden1 === '') {

           
            $('#msg_show').val('You must upload atleast one image file');
            $("#alert_false").click();
            return false;

        }






    });

</script>

<script type="text/javascript">
    $("#place_1").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=place_1]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
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

                $('#done').hide();

            }
        });
    });

</script>

<script type="text/javascript">
    $("#place_2").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=place_2]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
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

            },
            error: function() {
                $('#done2').hide();
            }
        });
    });

</script>

<script type="text/javascript">
    $("#place_3").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=place_3]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_image') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader3").show();
            },
            success: function(response) {
                var image_name = response['image'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done3').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader3").hide();
                    $("input[name='image_hidden3']").val(image_name);

                } else {
                    $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $("#loader3").hide();
                    $('#done3').hide();
                }

            },
            error: function() {
                $('#done3').hide();
            }
        });
    });

</script>

<script type="text/javascript">
    $("#place_4").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=place_4]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_image') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader4").show();
            },
            success: function(response) {
                var image_name = response['image'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done4').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader4").hide();
                    $("input[name='image_hidden4']").val(image_name);

                } else {
                   $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $("#loader4").hide();
                    $('#done4').hide();
                }

            },
            error: function() {
                $('#done4').hide();
            }
        });
    });

</script>


<!-- Additional images upload -->
<script type="text/javascript">
    $("#place_5").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=place_5]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_image') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader5").show();
            },
            success: function(response) {
                var image_name = response['image'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done5').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader5").hide();
                    $("input[name='image_hidden5']").val(image_name);

                } else {
                   $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $("#loader5").hide();
                    $('#done5').hide();
                }

            },
            error: function() {
                $('#done5').hide();
            }
        });
    });



    $("#place_6").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=place_6]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_image') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader6").show();
            },
            success: function(response) {
                var image_name = response['image'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done6').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader6").hide();
                    $("input[name='image_hidden6']").val(image_name);

                } else {
                   $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $("#loader6").hide();
                    $('#done6').hide();
                }

            },
            error: function() {
                $('#done6').hide();
            }
        });
    });

    $("#place_7").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=place_7]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_image') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader7").show();
            },
            success: function(response) {
                var image_name = response['image'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done7').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader7").hide();
                    $("input[name='image_hidden7']").val(image_name);

                } else {
                   $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $("#loader7").hide();
                    $('#done7').hide();
                }

            },
            error: function() {
                $('#done7').hide();
            }
        });
    });


    $("#place_8").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=place_8]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_image') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader8").show();
            },
            success: function(response) {
                var image_name = response['image'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done8').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader8").hide();
                    $("input[name='image_hidden8']").val(image_name);

                } else {
                   $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $("#loader8").hide();
                    $('#done8').hide();
                }

            },
            error: function() {
                $('#done8').hide();
            }
        });
    });



    $("#place_9").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=place_9]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_image') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader9").show();
            },
            success: function(response) {
                var image_name = response['image'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done9').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader9").hide();
                    $("input[name='image_hidden9']").val(image_name);

                } else {
                   $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $("#loader9").hide();
                    $('#done9').hide();
                }

            },
            error: function() {
                $('#done9').hide();
            }   
        });
    });


    $("#place_10").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=place_10]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_image') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader10").show();
            },
            success: function(response) {
                var image_name = response['image'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done10').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader10").hide();
                    $("input[name='image_hidden10']").val(image_name);

                } else {
                   $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $("#loader10").hide();
                    $('#done10').hide();
                }

            },
            error: function() {
                $('#done10').hide();
            }
        });
    });

</script>
<!-- Additional images upload -->

<script type="text/javascript">
    $("#en-audio").change(function(e) {
        var data = new FormData();
        data.append('audio', $('input[id=en-audio]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_audio') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#audio_loader").show();
            },
            success: function(response) {
                var image_name = response['audio'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done_audio').show();
                    //$('#add1').prop('disabled', true);
                    $("#audio_loader").hide();
                    $("input[name='audio_hidden1']").val(image_name);
                    
                } else {
                    $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $('#done_audio').hide();
                    $("#audio_loader").hide();
                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(errors) {
                    $('#msg_show').val(errors);
                    $("#alert_false").click();
                    $('#done_audio').hide();
                    $("#audio_loader").hide();
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
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_audio') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader6").show();
            },
            success: function(response) {
                var image_name = response['audio'];
                var flag = response['flag'];
                if (flag == 'true') {
                    //$('#done6').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader6").hide();
                    $("input[name='audio_hidden2']").val(image_name);
                   
                } else {
                    $('#msg_show').val(image_name);
                    $("#alert_false").click();
                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(errors) {
                    $('#msg_show').val(errors);
                    $("#alert_false").click();
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
        data.append('from', "add_poi");
        $.ajax({
            url: '{{ route('add_audio') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader7").show();
            },
            success: function(response) {
                var image_name = response['audio'];
                var flag = response['flag'];
                if (flag == 'true') {
                    //$('#done7').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader7").hide();
                    $("input[name='audio_hidden3']").val(image_name);
                    
                } else {
                   $('#msg_show').val(image_name);
                    $("#alert_false").click();
                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(errors) {
                    $('#msg_show').val(errors);
                    $("#alert_false").click();
                })
            }
        });
    });

</script>
@include('footer')
