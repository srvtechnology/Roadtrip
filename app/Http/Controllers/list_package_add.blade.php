@include('header')
<!-- Content Wrapper. Contains page content -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Package</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('do_list_package_add') }}"
                                enctype="multipart/form-data">


                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="package-img">Package Image</label>
                                        <input id="package-img" type="file" name="package_image" style="display: none;"
                                            onchange="loadFile(event)">
                                        <label for="package-img"
                                            style="width: 100%; height: 100px; border:1px solid #c2c2c2; display: flex; justify-content: center; align-items: center; padding: 10px;"><img
                                                id="output" style="max-height: 100%; max-width: 100%;"
                                                src="<?php echo url('/'); ?>/dist/img/photo.png">
                                        </label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="active-img">Package Active Image</label>
                                        <input id="active-img" type="file" name="package_active_image"
                                            style="display: none;" onchange="loadFile1(event)">
                                        <label for="active-img"
                                            style="width: 100%; height: 100px; border:1px solid #c2c2c2; display: flex; justify-content: center; align-items: center; padding: 10px;">
                                            <img id="output1" style="max-height: 100%; max-width: 100%;"
                                                src="<?php echo url('/'); ?>/dist/img/photo.png">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label>Package Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Package Name"
                                            required="" maxlength="25" value="" name="package_name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Price (USD)</label>
                                        <input type="text"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');"
                                            class="form-control" placeholder="Enter Price in USD" required=""
                                            maxlength="8" value="" name="package_price">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Sequence *</label>
                                        <input type="number"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');"
                                            class="form-control" placeholder="Enter Sequence" required=""
                                            maxlength="4" value="0" name="sequence">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Daily Route</label>
                                        <select class="form-control select2" multiple="" name="routes[]"
                                            placeholder="Select Daily Routes">
                                            @foreach ($routes as $route)

                                                <option value="{{ $route->route_id }}">
                                                    {{ $route->route_title_en }}</option>


                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Podcast</label>
                                        <select class="form-control select2" multiple="" name="podcasts[]"
                                            placeholder="Select Podcasts">
                                            @foreach ($podcasts as $podcast)

                                                <option value="{{ $podcast->pod_id }}">
                                                    {{ $podcast->pod_title_en }}
                                                </option>


                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-secondary w-100" id="submit_botton"
                                        value="Submit" name="submit">
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


{{--  --}}


<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

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

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<script>
    var loadFile1 = function(event1) {
        var reader = new FileReader();
        reader.onload = function() {
            var output1 = document.getElementById('output1');
            output1.src = reader.result;
        };
        reader.readAsDataURL(event1.target.files[0]);
    };
</script>
@include('footer')
