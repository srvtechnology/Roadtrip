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
                    @include('messages')
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('do_list_package_add') }}"
                                enctype="multipart/form-data" id="Frm_sign">


                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="row">
                                   <div class=" form-group col-md-6 text-left">
                                    <label for="package-img-new" style="text-align: center;">Package Image <span class="text-danger">*</span></label>
                                     <input id="package-img-new" accept="image/png, image/jpg, image/jpeg" type="file"  name="package_image" required="" style="opacity: 0" onchange="return fileValidation()"> 
                                        

                                        <div class="phto-set border pt-2 pb-2 text-center" style="height: 180px;">
                                        
                                        <label for="package-img-new"
                                            style="max-width: 100%; max-height: 100%;display: flex; justify-content: center; align-items: center;"><img
                                                id="imagePreview" style="max-height: 100%; max-width: 100%;"
                                                src="<?php echo url('/'); ?>/dist/img/photo.png">
                                        </label> 
                                        <div class="set-label">
                                                <label for="package-img-new"><i class="fa fa-camera"></i></label>
                                        </div>   
                                        </div>
                                        <small class="breadcrumb-item active">Image format png, jpg or jpeg. Image Dimension must be 1152px X 384px and size must be below 200kb</small>
                                        <script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('package-img-new');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Only accept image JPEG, PNG, JPG');
                fileInput.value = '';
                return false;
            } 
            else 
            {
              
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
                }
            }
        }
    </script>
                                   </div>

                                    <div class="col-md-6 form-group text-left">
                                        <label for="package-active-img-new">Package Active Image <span class="text-danger">*</span></label>
                                         <input id="package-active-img-new" accept="image/png, image/jpg, image/jpeg" type="file"  name="package_active_image" required="" style="opacity: 0" onchange="return fileValidation2()"> 
                                        <div class="phto-set border pt-2 pb-2 text-center" style="height: 180px;">
                                       
                                        <label for="package-active-img-new"
                                            style="max-width: 100%; max-height: 100%;display: flex; justify-content: center; align-items: center;"><img
                                                id="imagePreview2" style="max-height: 100%; max-width: 100%;"
                                                src="<?php echo url('/'); ?>/dist/img/photo.png">
                                        </label> 
                                        <div class="set-label">
                                                <label for="package-active-img-new"><i class="fa fa-camera"></i></label>
                                        </div>   
                                        </div>
                                         <small class="breadcrumb-item active">Image format png, jpg or jpeg. Image Dimension must be 650px X 327px and size must be below 200kb</small>
                                        <script>
        function fileValidation2() {
            var fileInput = 
                document.getElementById('package-active-img-new');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Only accept image JPEG, PNG, JPG');
                fileInput.value = '';
                return false;
            } 
            else 
            {
              
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview2');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
                }
            }
        }
    </script>
                                   </div>
                                    <!-- <div class="form-group col-md-6 text-center">
                                        <label for="package-img">Package Image <span class="text-danger">*</span></label>
                                        <div class="phto-set border pt-2 pb-2 text-center" style="height: 180px;">
                                        <input id="package-img" accept="image/png, image/jpg, image/jpeg" type="file"  name="package_image" style="display: none;" onchange="loadFile(event)"> 
                                        <label for="package-img"
                                            style="max-width: 100%; max-height: 100%;display: flex; justify-content: center; align-items: center;"><img
                                                id="output" style="max-height: 100%; max-width: 100%;"
                                                src="<?php echo url('/'); ?>/dist/img/photo.png">
                                        </label> 
                                        <div class="set-label">
                                                <label for="package-img"><i class="fa fa-camera"></i></label>
                                        </div>   
                                        </div>
                                        <small class="breadcrumb-item active">Image format png, jpg or jpeg. Image Dimension must be 1152px X 384px and size must be below 200kb</small>
                                    </div> -->

                                    <!-- <div class="form-group col-md-6 text-center">
                                    <label for="active-img">Package Active Image <span class="text-danger">*</span></label>
                                     <div class="phto-set border pt-2 pb-2 text-center" style="height: 180px;">
                                     <input id="active-img" accept="image/png, image/jpg,  image/jpeg" type="file" name="package_active_image"style="display: none;" onchange="loadFile1(event)" >
                                     <label for="active-img"
                                            style="max-width: 100%; max-width:100%;  display: flex; justify-content: center; align-items: center;">
                                            <img id="output1" style="max-height: 100%; max-width: 100%;"
                                                src="<?php echo url('/'); ?>/dist/img/photo.png">
                                     </label>
                                     <div class="set-label">
                                                <label for="active-img"><i class="fa fa-camera"></i></label>
                                        </div>  
                                     </div>
                                        
                                        
                                        <small class="breadcrumb-item active">Image format png, jpg or jpeg. Image Dimension must be 650px X 327px and size must be below 200kb</small>
                                    </div> -->
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label>Package Name <span class="text-danger">*</span></label>

                                        
                                        <input type="text" id="package_name" class="form-control" placeholder="Enter Package Name"
                                            required="" maxlength="25" value="{{ old('package_name') }}" name="package_name">
                                     

                                        
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Price (USD) <span class="text-danger">*</span></label>
                                        <input type="text"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');"
                                            class="form-control" placeholder="Enter Price in USD" required=""
                                            maxlength="8" value="{{ old('package_price') }}" name="package_price">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Sequence <span class="text-danger">*</span></label>
                                        <input type="number"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');"
                                            class="form-control" placeholder="Enter Sequence" required=""
                                            maxlength="4" value="{{ old('sequence') }}" name="sequence">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Daily Route <span class="text-danger">*</span></label>
                                        <select class="form-control select2" multiple="" name="routes[]"
                                            data-placeholder="Select Daily Routes" required="">
                                            @foreach ($routes as $route)

                                                <option value="{{ $route->route_id }}">
                                                    {{ $route->route_title_en }}</option>


                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Podcast <span class="text-danger">*</span></label>
                                        <select class="form-control select2" multiple="" name="podcasts[]"
                                            data-placeholder="Select Podcasts" required="">
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
