@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Point Of Interests</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Point Of Interests</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daily Route Details.</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="banner-img-area border p-2 shadow">
                                        <!-- <img class="d-block w-100" src="dist/img/photo1.png" style="height:200px; object-position: center; object-fit: cover;"> -->
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_1 }}"
                                            data-toggle="lightbox" data-title="Point of Interest Image 1">
                                            <img src="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_1 }}"
                                                class="d-block w-100"
                                                style="height:200px; object-position: center; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                @if($poi_details[0]->poi_img_2!="")
                                <div class="col-md-6 col-lg-3">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_2 }}"
                                            data-toggle="lightbox" data-title="Point of Interest Image 2">
                                            <img src="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_2 }}"
                                                class="d-block w-100"
                                                style="height:200px; object-position: center; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @if($poi_details[0]->poi_img_3!="")
                                <div class="col-md-6 col-lg-3">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_3 }}"
                                            data-toggle="lightbox" data-title="Point of Interest Image 3">
                                            <img src="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_3 }}"
                                                class="d-block w-100"
                                                style="height:200px; object-position: center; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @if($poi_details[0]->poi_img_4!="")
                                <div class="col-md-6 col-lg-3">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_4 }}"
                                            data-toggle="lightbox" data-title="Point of Interest Image 4">
                                            <img src="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_4 }}"
                                                class="d-block w-100"
                                                style="height:200px; object-position: center; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @if($poi_details[0]->poi_img_5!="")
                                <div class="col-md-6 col-lg-3">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_5 }}"
                                            data-toggle="lightbox" data-title="Point of Interest Image 5">
                                            <img src="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_5 }}"
                                                class="d-block w-100"
                                                style="height:200px; object-position: center; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @if($poi_details[0]->poi_img_6!="")
                                <div class="col-md-6 col-lg-3">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_6 }}"
                                            data-toggle="lightbox" data-title="Point of Interest Image 6">
                                            <img src="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_6 }}"
                                                class="d-block w-100"
                                                style="height:200px; object-position: center; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @if($poi_details[0]->poi_img_7!="")
                                <div class="col-md-6 col-lg-3">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_7 }}"
                                            data-toggle="lightbox" data-title="Point of Interest Image 7">
                                            <img src="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_7 }}"
                                                class="d-block w-100"
                                                style="height:200px; object-position: center; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @if($poi_details[0]->poi_img_8!="")
                                <div class="col-md-6 col-lg-3">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_8 }}"
                                            data-toggle="lightbox" data-title="Point of Interest Image 8">
                                            <img src="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_8 }}"
                                                class="d-block w-100"
                                                style="height:200px; object-position: center; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @if($poi_details[0]->poi_img_9!="")
                                <div class="col-md-6 col-lg-3">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_9 }}"
                                            data-toggle="lightbox" data-title="Point of Interest Image 9">
                                            <img src="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_9 }}"
                                                class="d-block w-100"
                                                style="height:200px; object-position: center; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @if($poi_details[0]->poi_img_10!="")
                                <div class="col-md-6 col-lg-3">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_10 }}"
                                            data-toggle="lightbox" data-title="Point of Interest Image 10">
                                            <img src="<?php echo url('/'); ?>/image_route/{{ $poi_details[0]->poi_img_10 }}"
                                                class="d-block w-100"
                                                style="height:200px; object-position: center; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>
                                @endif

                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table class="table">
                                        <tbody>
                                            @if ($language == 'en')
                                                <tr>
                                                    <th>Title:</th>
                                                    <td>{{ $poi_details[0]->poi_name_en }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description:</th>
                                                    <td>{{ $poi_details[0]->poi_description_en }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Audio:</th>
                                                    <td> <audio controls="controls">
                                                            <source
                                                                src="<?php echo url('/'); ?>/audio_route/{{ $poi_details[0]->poi_audio_en }}"
                                                                type="audio/mp4" />
                                                        </audio></td>
                                                </tr>
                                            @elseif($language == 'fr')
                                                <tr>
                                                    <th>Title:</th>
                                                    <td>{{ $poi_details[0]->poi_name_fr }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description:</th>
                                                    <td>{{ $poi_details[0]->poi_description_fr }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Audio:</th>
                                                    <td> <audio controls="controls">
                                                            <source
                                                                src="<?php echo url('/'); ?>/audio_route/{{ $poi_details[0]->poi_audio_fr }}"
                                                                type="audio/mp4" />
                                                        </audio></td>
                                                </tr>
                                              @elseif($language == 'de')
                                                <tr>
                                                    <th>Title:</th>
                                                    <td>{{ $poi_details[0]->poi_name_de }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description:</th>
                                                    <td>{{ $poi_details[0]->poi_description_de }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Audio:</th>
                                                    <td> <audio controls="controls">
                                                            <source
                                                                src="<?php echo url('/'); ?>/audio_route/{{ $poi_details[0]->poi_audio_de }}"
                                                                type="audio/mp4" />
                                                        </audio></td>
                                                </tr>
                                            @else
                                                 <tr>
                                                    <th>Title:</th>
                                                    <td>{{ $poi_details[0]->poi_name_en }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description:</th>
                                                    <td>{{ $poi_details[0]->poi_description_en }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Audio:</th>
                                                    <td> <audio controls="controls">
                                                            <source
                                                                src="<?php echo url('/'); ?>/audio_route/{{ $poi_details[0]->poi_audio_en }}"
                                                                type="audio/mp4" />
                                                        </audio></td>
                                                </tr>
                                            @endif


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            /*'columnDefs': [{ 'orderable': false, 'targets': 1 }], // hide sort icon on header of first column
     'aaSorting': [[0, 'asc']] // start to sort data in second column */
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

</script>
<script>
    $(function() {

        $('.toastsDefaultAutohideinfo').click(function() {
            $(document).Toasts('create', {
                class: 'bg-info',
                title: 'Toast Title',
                //position:'',
                autohide: true,
                delay: 2000,
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });


        $('.dangeralert').click(function() {
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Toast Title',
                //position:'',
                autohide: true,
                delay: 2000,
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });


    });

</script>

<script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })

</script>
@include('footer')
