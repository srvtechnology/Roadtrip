@include('header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Podcast</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Podcast</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<input type="hidden" id="msg_show" name="msg_show" value="">
    <div class="col-md-6">
<button style="display: none;" type="button" id="alert_true" class="btn btn-default toastsDefaultAutohideinfo">

                </button>
                 <button style="display: none;" type="button" id="alert_false" class="btn btn-default dangeralert">

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
                  <div class="form-group col-md-4 m-auto">
                    <form method="POST">
                    <label>Add Podcast Image</label><br> <small>(image dimension
 is 500 px X 500 px)
</small>
                    <div class="phto-set border pt-2 pb-2 text-center" style="height: 300px;">
                    <label for="banner-img"><img  src="<?php echo url('/'); ?>/dist/img/photo.png" id="thumbnil" style="max-width:100%; height: auto;"></label>
                     <div class="set-label">
                  <label for="banner-img"><i class="fa fa-camera"></i></label>
                </div>

                    </div>
                     <div class="centered-txt text-center" id="done" style="display:none;"><i
                                                class="fa fa-check-circle"></i><br>Uploaded</div>
                                        <div class="d-flex justify-content-center"><label class="image-previewer"><img
                                                    src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                    id="loader" style="max-width:12%;display: none"></label></div>
                    <input type="file" id="banner-img" accept="image/*"  name="banner_img" onchange="showMyImage(this)" style="display: none;" required>
                  </div>

                </div>
              </div>
            </div>
            </form>

          </div>
        </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-header bg-dark">
                  <h5 class="card-title">English</h5>
                </div>
                <div class="card-body">
               <form method="post" action="{{ route('do_add_podcast') }}">
         <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <input type="hidden" name="image_hidden1" value="">


                                <input type="hidden" name="audio_hidden1" value="">
                                <input type="hidden" name="audio_hidden2" value="">
                                <input type="hidden" name="audio_hidden3" value="">

                  <div class="form-group">
                    <label>Add Podcast  Audio <i class="fa fa-music"></i><span class="text-danger">*</span> </label> <br>
                    <label for="en-audio" class="btn btn-info">Upload <i class="fa fa-upload"></i></label>
                    <input id="en-audio" accept="audio/x-m4a" type="file"  name="en_fileAudio"  value=""  style="display: none;" />
                     <small id="emailHelp" class="form-text text-muted">(Accept Only M4A Audio Maximum Size 5 MB)</small>

                     <div class="centered-txt text-left" id="done2" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="d-flex justify-content-left"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                id="loader2" style="max-width:12%;display: none"></label></div>
                      <audio controls="controls"   controlslist="nodownload" id="audioPreview" style="display:none">
                      <source src="" type="audio/m4a" />
                       </audio>
                  </div>
                  <div class="form-group">
                    <label>Add Podcast Title</label>
                    <input type="text" class="form-control" placeholder="Add Podcast Title" maxlength="120" name="en_title" required>
                    <small>(Maximum 120 Characters)</small> 
                  </div>
                  <div class="form-group">
                    <label>Podcast Description</label>
                    <textarea class="form-control" name="en_des" rows="2" placeholder="Podcast Description" maxlength="200" required></textarea>
                    <small>(Maximum 200 Characters)</small> 
                  </div>

                  <div class="form-group">
                    <label>Podcast Duration</label>
                    <input type="text" class="form-control" placeholder="Podcast Duration" maxlength="120" name="en_dur" required>
                    <small>(Maximum 120 Characters)</small>
                  </div>


                </div>
              </div>

            <div class="card">
                <div class="card-header bg-dark">
                  <h5 class="card-Add Daily Route Title">French</h5>
                </div>
                <div class="card-body">

                  <div class="form-group">
                   <label>Add Podcast  Audio <i class="fa fa-music"></i> </label> <br>
                    <label for="fr-audio" class="btn btn-info">Upload <i class="fa fa-upload"></i></label>
                    <input id="fr-audio" accept="audio/x-m4a" type="file"  name="fr_fileAudio" value=""  style="display: none;" />
                    <small id="emailHelp" class="form-text text-muted">(Accept Only M4A Audio Maximum Size 5 MB)</small>

                    <div class="centered-txt text-left" id="done3" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="d-flex justify-content-left"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                id="loader3" style="max-width:12%;display: none"></label></div>

                      <audio controls="controls" id="" style="display:none">
                      <source src="" type="audio/m4a" />
                       </audio>
                  </div>
                  <div class="form-group">
                    <label>Add Podcast Title</label>
                    <input type="text" class="form-control" placeholder="Add Podcast Title" maxlength="120" name="fr_title" required>
                    <small>(Maximum 120 Characters)</small> 
                  </div>
                  <div class="form-group">
                    <label>Podcast Description</label>
                    <textarea class="form-control" name="fr_des" rows="2" placeholder="Podcast Description" maxlength="200" required></textarea>
                    <small>(Maximum 200 Characters)</small> 
                  </div>
                  <div class="form-group">
                    <label>Podcast Duration</label>
                    <input type="text" class="form-control" placeholder="Podcast Duration" maxlength="120" name="fr_dur" required>
                    <small>(Maximum 120 Characters)</small>
                  </div>


                </div>
              </div>
              <div class="card">
                <div class="card-header bg-dark">
                  <h5 class="card-title">German</h5>
                </div>
                <div class="card-body">

                  <div class="form-group">
                    <label>Add Podcast  Audio <i class="fa fa-music"></i> </label> <br>
                     <label for="de-audio" class="btn btn-info">Upload <i class="fa fa-upload"></i></label>
                    <input id="de-audio" accept="audio/x-m4a" type="file"  name="de_fileAudio" value=""   style="display: none;" />
                    <small id="emailHelp" class="form-text text-muted">(Accept Only M4A Audio Maximum Size 5 MB)</small>

                       <div class="centered-txt text-left" id="done4" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="d-flex justify-content-left"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif"
                                                id="loader4" style="max-width:12%;display: none"></label></div>

                      <audio controls="controls" id="" style="display:none">
                      <source src="" type="audio/m4a" />
                       </audio>
                  </div>
                  <div class="form-group">
                    <label>Add Podcast Title</label>
                    <input type="text" class="form-control" placeholder="Add Podcast Title" maxlength="120" name="de_title" required>
                    <small>(Maximum 120 Characters)</small> 
                  </div>

                  <div class="form-group">
                    <label>Add Podcast Description</label>
                    <textarea class="form-control" name="de_des" rows="2" placeholder="Podcast Description" maxlength="200" required></textarea>
                    <small>(Maximum 200 Characters)</small> 
                  </div>
                  <div class="form-group">
                    <label>Add Podcast Duration</label>
                    <input type="text" class="form-control" placeholder="Podcast Duration" maxlength="120" name="de_dur" required>
                    <small>(Maximum 120 Characters)</small>
                  </div>


                </div>
                <div class="card-footer">
                  <input type="submit" class="btn btn-secondary w-100" id="submit_botton" value="Submit" name="de">
                </div>
              </div>
            </form>

            </div>
          </div>


        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!--  -->
<script>
    $('#submit_botton').click(function() {



        var audio_hidden1 = $("input[name='audio_hidden1']").val();

        var audio_hidden2 = $("input[name='audio_hidden2']").val();

        var audio_hidden3 = $("input[name='audio_hidden3']").val();



        var image_hidden1 = $("input[name='image_hidden1']").val();




        // if (audio_hidden1 === '' || audio_hidden2 === '' || audio_hidden3 === '' ) {
          if (audio_hidden1 === ''  ) {


            //$('#msg_show').val('You must upload all audio file');
            $('#msg_show').val('You must upload audio file');
            $("#alert_false").click();
            return false;

        }

        if (image_hidden1 === '' || image_hidden2 === '' || image_hidden3 === '' || image_hidden4 === '') {


            $('#msg_show').val('You must upload the image file');
            $("#alert_false").click();
            return false;

        }






    });

</script>

<!--  -->

  <script type="text/javascript">
    $("#banner-img").change(function(e) {
        var data = new FormData();
        data.append('image', $('input[id=banner-img]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
        data.append('from', "add_pod");
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
                    $('#msg_show').val('Image should be in the dimension of 500px X 500PX');
                    $("#alert_false").click();
                        $("#loader").hide();
                        $('#done').hide();
                }

            },
            error: function() {



            }
        });
    });

</script>






<script type="text/javascript">
    $("#en-audio").change(function(e) {
        var data = new FormData();
        data.append('audio', $('input[id=en-audio]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
         data.append('from', "add_pod");
        $.ajax({
            url: '{{ route('add_audio') }}',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader2").show();
            },
            success: function(response) {
                var image_name = response['audio'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done2').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader2").hide();
                    $("input[name='audio_hidden1']").val(image_name);
                    $('#msg_show').val("English audio successfully uploaded.");
                    $("#alert_true").click();
                } else {
                    $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $("#loader2").hide();
                    $('#done2').hide();
                   
                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(errors) {
                    $('#msg_show').val(errors);
                    $("#alert_false").click();
                    $("#loader2").hide();
                    $('#done2').hide();
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
        data.append('from', 'add_pod');
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
                    $("input[name='audio_hidden2']").val(image_name);
                    $('#msg_show').val("French audio successfully uploaded.");
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
    $("#de-audio").change(function(e) {
        var data = new FormData();
        data.append('audio', $('input[id=de-audio]')[0].files[0]);
        data.append('_token', "{{ csrf_token() }}");
       data.append('from', "add_pod");
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
                    $("input[name='audio_hidden3']").val(image_name);
                    $('#msg_show').val("German audio successfully uploaded.");
                    $("#alert_true").click();
                } else {
                    $('#msg_show').val(image_name);
                    $("#alert_false").click();
                    $("#loader4").hide();
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
 @include('footer')