@include('header')
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
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Daily Route</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    @include('messages')
                                    <label>Add Daily Route Banner Image</label>
                                    <div class="phto-set border pt-2 pb-2 text-center" style="height: 150px;">
                                        <label for="banner-img"><img src="dist/img/photo.png" id="thumbnil"
                                                style="max-height:100px;"></label>
                                        <form method="post">
                                            <div class="set-label">
                                                <label for="banner-img"><i class="fa fa-camera"></i></label>
                                            </div>
                                    </div>
                                    <input type="file" id="banner-img" name="banner_img" onchange="showMyImage(this)"
                                        style="display: none;">
                                    <div class="centered-txt text-center" id="done" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="centered-txt text-center"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif" id="loader"
                                                style="max-width:12%;display: none"></label></div>
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
                                <div class="form-group col-md-4">
                                    <label>Add Daily Route Map Image</label>
                                    <div class="phto-set border pt-2 pb-2 text-center">
                                        <label for="map-img"><img src="dist/img/photo.png" id="thumbnil2"
                                                style="max-height:100px;"></label>
                                        <div class="set-label">
                                            <label for="map-img"><i class="fa fa-camera"></i></label>
                                        </div>
                                    </div>
                                    <input type="file" id="map-img" name="map_img" onchange="showMyImage2(this)"
                                        style="display: none;">
                                    <div class="centered-txt text-center" id="done2" style="display:none;"><i
                                            class="fa fa-check-circle"></i><br>Uploaded</div>
                                    <div class="centered-txt text-center"><label class="image-previewer"><img
                                                src="<?php echo url('/'); ?>/dist/img/loader.gif" id="loader2"
                                                style="max-width:12%;display: none"></label></div>
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
                            <form method="post" action="{{ route('do_add_daily_route') }}">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <input type="hidden" name="image_hidden1" value="">
                                <input type="hidden" name="image_hidden2" value="">
                                <input type="hidden" name="audio_hidden1" value="">
                                <input type="hidden" name="audio_hidden2" value="">
                                <input type="hidden" name="audio_hidden3" value="">

                                <div class="form-group">
                                    <label>Add Daily Route Audio <i class="fa fa-music"></i> </label> <br>
                                    <label for="en-audio" class="btn btn-info">Upload <i
                                            class="fa fa-upload"></i></label>
                                    <input id="en-audio" accept="audio/m4a" type="file" name="en_fileAudio"
                                        onchange="PreviewAudio(this, $('#audioPreview'))" style="display: none;"
                                        required="" />
                                    <small id="emailHelp" class="form-text text-muted">(Add Only M4A Audio)</small>

                                    <audio controls="controls" controlslist="nodownload" id="audioPreview"
                                        style="display:none">
                                        <source src="" type="audio/m4a" />
                                    </audio>
                                </div>
                                <div class="form-group">
                                    <label>Add Daily Route Title</label>
                                    <input type="text" class="form-control" placeholder="Add Add Daily Route Title"
                                        maxlength="120" name="en_title" required="">
                                </div>
                                <div class="form-group">
                                    <label> Daily Route Type</label>
                                    <select class="form-control" name="en_type">
                                        <option value=""> Choose Type</option>
                                        <option value="0">Clockwise</option>
                                        <option value="1">Anti Clockwise</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Daily Route Description</label>
                                    <textarea class="form-control" name="en_des" rows="2"
                                        placeholder=" Daily Route Description" maxlength="200" required=""></textarea>
                                </div>


                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-dark">
                            <h5 class="card-Add Daily Route Title">Franchise</h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Add Daily Route Audio <i class="fa fa-music"></i> </label> <br>
                                <label for="fr-audio" class="btn btn-info">Upload <i class="fa fa-upload"></i></label>
                                <input id="fr-audio" accept="audio/m4a" type="file" name="fr_fileAudio"
                                    onchange="PreviewAudio2(this, $('#audioPreview2'))" style="display: none;" />
                                <small id="emailHelp" class="form-text text-muted">(Add Only M4A Audio)</small>

                                <audio controls="controls" controlslist="nodownload" id="audioPreview2"
                                    style="display:none">
                                    <source src="" type="audio/m4a" />
                                </audio>
                            </div>
                            <div class="form-group">
                                <label>Add Daily Route Title</label>
                                <input type="text" class="form-control" placeholder="Add Daily Route Title"
                                    maxlength="120" name="fn_title" required="">
                            </div>
                            <div class="form-group">
                                <label> Daily Route Type</label>
                                <select class="form-control" name="fn_type" required="">
                                    <option value=""> Choose Type</option>
                                    <option value="0">Clockwise</option>
                                    <option value="1">Anti Clockwise</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Daily Route Description</label>
                                <textarea class="form-control" name="fn_des" rows="2"
                                    placeholder="Daily Route Description" maxlength="200" required=""></textarea>
                            </div>


                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h5 class="card-title">German</h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Add Daily Route Audio <i class="fa fa-music"></i> </label> <br>
                                <label for="de-audio" class="btn btn-info">Upload <i class="fa fa-upload"></i></label>
                                <input id="de-audio" accept="audio/m4a" type="file" name="de_fileAudio"
                                    onchange="PreviewAudio3(this, $('#audioPreview3'))" style="display: none;" />
                                <small id="emailHelp" class="form-text text-muted">(Add Only M4A Audio)</small>

                                <audio controls="controls" controlslist="nodownload" id="audioPreview3"
                                    style="display:none">
                                    <source src="" type="audio/m4a" />
                                </audio>
                            </div>
                            <div class="form-group">
                                <label>Titel</label>
                                <input type="text" class="form-control" placeholder="Titel hinzufügen" maxlength="120"
                                    name="de_title" required="">
                            </div>
                            <div class="form-group">
                                <label> Daily Route Type</label>
                                <select class="form-control" name="de_type" required="">
                                    <option value=""> Choose Type</option>
                                    <option value="0">Clockwise</option>
                                    <option value="1">Anti Clockwis</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Daily Route Description</label>
                                <textarea class="form-control" name="de_des" rows="2"
                                    placeholder="Daily Route Description" maxlength="200" required=""></textarea>
                            </div>


                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-secondary w-100" value="Submit">
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
                    $(document).find('[name=banner_img]').after(
                        '<span class="text-strong textdanger">' + image_name + '</span>')
                        $("#loader").hide();
                }

            },
            error: function() {

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
                    $(document).find('[name=map_img]').after(
                        '<span class="text-strong textdanger">' + image_name + '</span>')
                }



                /*var baseUrl = "{{ asset('') }}";
                var imageUrl = baseUrl + data.msg;
                $('#changeimage').html('<img src="'+ imageUrl +'" height="120px" width="150px">');*/
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
                    $(document).find('[name=en_fileAudio]').after(
                        '<span class="text-strong textdanger">Uploaded</span>')
                } else {
                    $(document).find('[name=en_fileAudio]').after(
                        '<span class="text-strong textdanger">' + image_name + '</span>')
                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(errors) {
                    $(document).find('[name=en_fileAudio]').after(
                        '<span class="text-strong textdanger">' + errors + '</span>')
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
                $("#loader2").show();
            },
            success: function(response) {
                var image_name = response['audio'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done2').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader2").hide();
                    $("input[name='audio_hidden2']").val(image_name);
                    $(document).find('[name=fr_fileAudio]').after(
                        '<span class="text-strong textdanger">Uploaded</span>')
                } else {
                    $(document).find('[name=fr_fileAudio]').after(
                        '<span class="text-strong textdanger">' + image_name + '</span>')
                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(errors) {
                    $(document).find('[name=fr_fileAudio]').after(
                        '<span class="text-strong textdanger">' + errors + '</span>')
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
                $("#loader2").show();
            },
            success: function(response) {
                var image_name = response['audio'];
                var flag = response['flag'];
                if (flag == 'true') {
                    $('#done2').show();
                    //$('#add1').prop('disabled', true);
                    $("#loader2").hide();
                    $("input[name='audio_hidden3']").val(image_name);
                    $(document).find('[name=de_fileAudio]').after(
                        '<span class="text-strong textdanger">Uploaded</span>')
                } else {
                    $(document).find('[name=de_fileAudio]').after(
                        '<span class="text-strong textdanger">' + image_name + '</span>')
                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(errors) {
                    $(document).find('[name=de_fileAudio]').after(
                        '<span class="text-strong textdanger">' + errors + '</span>')
                })
            }
        });
    });

</script>
@include('footer')
