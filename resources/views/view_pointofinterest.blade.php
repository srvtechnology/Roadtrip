@include('..header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daily Route</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $route_details[0]->route_top_banner_img }}"
                                            data-toggle="lightbox" data-title="Top Banner Image"> <img class="d-block w-100"
                                                src="<?php echo url('/'); ?>/image_route/{{ $route_details[0]->route_top_banner_img }}"
                                                style="height: 200px; object-position: center; object-fit: cover;"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_route/{{ $route_details[0]->route_map_banner_img }}"
                                            data-toggle="lightbox" data-title="Map Banner Image"> <img class="d-block w-100"
                                                src="<?php echo url('/'); ?>/image_route/{{ $route_details[0]->route_map_banner_img }}"
                                                style="height: 200px; object-position: center; object-fit: cover;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                        href="#pills-english" role="tab" aria-controls="pills-english"
                                        aria-selected="true">English</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-french"
                                        role="tab" aria-controls="pills-profile" aria-selected="false">French</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-german"
                                        role="tab" aria-controls="pills-contact" aria-selected="false">German</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="card-body">
                            @include('messages')
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-english" role="tabpanel">
                                    <div class="row">

                                        <div class="col-md-12 col-sm-12 col-lg-6">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">

                                                    <tbody>
                                                        <tr>
                                                            <th class="align-middle">Daily Route Type:</th>
                                                            <td class="align-middle">
                                                              @if ($route_details[0]->route_type=="0")
                                                                 Clockwise 
                                                              @else
                                                                  Anti Clockwise
                                                              @endif
                                                              </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="align-middle">Daily Route Title:</th>
                                                            <td class="align-middle">{{ $route_details[0]->route_title_en }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th class="align-middle">Daily Route Audio:</th>
                                                            <td class="align-middle"> <audio controls="controls" onplay="pauseOthers(this);"
                                                                    controlslist="nodownload">
                                                                    <source src="<?php echo url('/'); ?>/audio_route/{{ $route_details[0]->route_audio_en }}"  />
                                                                </audio></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-xs-12 p-2 ">
                                            <label>Daily Route Description: </label>
                                            <p>{{ $route_details[0]->route_description_en }}</p>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-12">
                                             <div class="card-header">
                          <form method="POST" action="{{route('add_point_of_interest')}}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <input type="hidden" name="route_id" value="{{ $route_details[0]->route_id }}"/>
                          
                <button class="btn btn-info float-right">Add Point Of Interest</button>
              
                                </form>
                        </div>
                                     <div class="card-body table-responsive">
                                            <table id="example4" class="table route_table">
                                                <thead class="table-light">
                                                    
                                                    <tr>
                                                        <th>SL.No</th>

                                                        <th>POI Banner</th>
                                                        <th style="width: 300px;">POI Name</th>
                                                        <th class="text-center">POI Audio</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @for($i = 0; $i < count($poi_list); $i++)
                                                    
                                                  
                                                    <tr>
                                                        <td class="align-middle">{{$i+1}}</td>

                                                        <td class="align-middle"><img src="<?php echo url('/'); ?>/image_route/{{ $poi_list[$i]->poi_img_1 }}"></td>
                                                        <td class="align-middle" style="width: 300px;">{{ $poi_list[$i]->poi_name_en }}</td>
                                                        <td class="align-middle text-center"><audio controls="controls" onplay="pauseOthers(this);"
                                                                controlslist="nodownload">
                                                                <source src="<?php echo url('/'); ?>/audio_route/{{ $poi_list[$i]->poi_audio_en }}" />
                                                            </audio></td>

                                                        <td class="align-middle">
                                                            <a href="{{route('details_point_of_interest',['language'=>'en','poi_id'=> base64_encode($poi_list[$i]->poi_id)])}}"
                                                                class="btn btn-sm btn-info"
                                                                title="View Point of Interest"><i
                                                                    class="fa fa-eye"></i></a>
                                                            <a href="{{route('edit_point_of_interest',['poi_id'=>base64_encode($poi_list[$i]->poi_id)])}}" class="btn btn-sm btn-info" title="Edit"><i
                                                                    class="fa fa-edit"></i></a>
                                                           <a style="color: white;" data-toggle="modal" data-target="#modal-en-{{$poi_list[$i]->poi_id}}" class="btn btn-sm btn-info" title="Delete"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
<div class="modal fade" id="modal-en-{{$poi_list[$i]->poi_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered ">
   <div class="modal-content">
     <div class="modal-header ">
       <h4  class="modal-title" style="margin: auto; text-align: center; width: 100%;"> Are you sure you want to delete?</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form method="POST" action="all_type_delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <div class="message-txt text-center">
        
         <h5>{{$poi_list[$i]->poi_name_en}}</h5>
         <input type="hidden" name="del_from" value="del_poi_list">
         <input type="hidden" name="poi_id" value="{{$poi_list[$i]->poi_id}}">
         <input type="hidden" name="route_id" value="{{$poi_list[$i]->route_id}}">
         <div class="yes-nobtn mt-4">
           <button  class="btn btn-sm" type="submit" style="background-color: #C68F60; color: #ffffff">Yes</button>
            <a data-dismiss="modal" class="btn btn-sm ml-2" style="background-color: #121212; color: #ffffff">No</a>
         </div>
       </div>
     </div>
   </form>
   </div>
 </div>
</div>
                                                    @endfor
                                                </tbody>
                                            </table>
                                          </div>
                                             <script type="text/javascript">
                        function pauseOthers(ele) {
                $("audio").not(ele).each(function (index, audio) {
                    audio.pause();
                });
            }
                       </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-french" role="tabpanel">
                                   <div class="row">

                                        <div class="col-md-12 col-sm-12 col-lg-6">

                                            <div class="table-responsive">
                                                <table  class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th class="align-middle">Type:</th>
                                                            <td class="align-middle">
                                                              @if ($route_details[0]->route_type=="0")
                                                                 Clockwise 
                                                              @else
                                                                  Anti Clockwise
                                                              @endif
                                                              </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="align-middle">Title:</th>
                                                            <td class="align-middle">{{ $route_details[0]->route_title_fr }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th class="align-middle">Audio:</th>
                                                            <td class="align-middle"> <audio controls="controls"
                                                                    controlslist="nodownload">
                                                                    <source src="<?php echo url('/'); ?>/audio_route/{{ $route_details[0]->route_audio_fr }}" />
                                                                </audio></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <b style="font-size: 10px; font-weight: 600;">Description: </b>
                                            <p>{{ $route_details[0]->route_description_fr }}</p>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-12">
                                             <div class="card-header">
                          <form method="POST" action="{{route('add_point_of_interest')}}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <input type="hidden" name="route_id" value="{{ $route_details[0]->route_id }}"/>
                          
                <button class="btn btn-info float-right">Add Point Of Interest</button>
              
                                </form>
                        </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="table route_table">
                                                    <thead class="table-light">

                                                        <tr>
                                                            <th>SL.No</th>

                                                            <th>First Image</th>
                                                            <th>Place Name</th>
                                                            <th class="text-center">Audio</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         @for($j = 0; $j < count($poi_list); $j++)
                                                    
                                                  
                                                    <tr>
                                                        <td class="align-middle">{{$j+1}}</td>

                                                        <td class="align-middle"><img src="<?php echo url('/'); ?>/image_point_of_interest/{{ $poi_list[$j]->poi_img_1 }}"></td>
                                                        <td class="align-middle">{{ $poi_list[$j]->poi_name_fr }}</td>
                                                        <td class="align-middle text-center"><audio controls="controls"
                                                                controlslist="nodownload">
                                                                <source src="<?php echo url('/'); ?>/audio_point_of_interest/{{ $poi_list[$j]->poi_audio_fr }}" />
                                                            </audio></td>

                                                        <td class="align-middle">
                                                            <a href="{{route('details_point_of_interest',['language'=>'fr','poi_id'=> base64_encode($poi_list[$j]->poi_id)])}}"
                                                                class="btn btn-sm btn-info"
                                                                title="Add Point Of Interest"><i
                                                                    class="fa fa-eye"></i></a>
                                                            <a href="#" class="btn btn-sm btn-info" title="Edit"><i
                                                                    class="fa fa-edit"></i></a>
                                                             <a style="color: white;" data-toggle="modal" data-target="#modal-fr-{{$poi_list[$j]->poi_id}}" class="btn btn-sm btn-info" title="Delete"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
<div class="modal fade" id="modal-fr-{{$poi_list[$j]->poi_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
     <div class="modal-header">
     
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form method="POST" action="all_type_delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <div class="message-txt text-center">
         <h4 class="text-uppercase font-weight-bold">Are you sure you want to delete?</h4>
         <h5>{{$poi_list[$j]->poi_name_fr}}</h5>
         <input type="hidden" name="del_from" value="del_poi_list">
         <input type="hidden" name="poi_id" value="{{$poi_list[$j]->poi_id}}">
         <input type="hidden" name="route_id" value="{{$poi_list[$j]->route_id}}">
         <div class="yes-nobtn mt-4">
           <button  class="btn btn-sm" type="submit" style="background-color: #C68F60; color: #ffffff">Yes</button>
            <a data-dismiss="modal" class="btn btn-sm ml-2" style="background-color: #121212; color: #ffffff">No</a>
         </div>
       </div>
     </div>
   </form>
   </div>
 </div>
</div>
                                                    @endfor

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-german" role="tabpanel">
                                    <div class="row">

                                        <div class="col-md-12 col-sm-12 col-lg-6">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th class="align-middle">Type:</th>
                                                            <td class="align-middle">
                                                              @if ($route_details[0]->route_type=="0")
                                                                 Clockwise 
                                                              @else
                                                                  Anti Clockwise
                                                              @endif
                                                              </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="align-middle">Title:</th>
                                                            <td class="align-middle">{{ $route_details[0]->route_title_de }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th class="align-middle">Audio:</th>
                                                            <td class="align-middle"> <audio controls="controls"
                                                                    controlslist="nodownload">
                                                                    <source src="<?php echo url('/'); ?>/audio_route/{{ $route_details[0]->route_audio_de }}"  />
                                                                </audio></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <h5>Description</h5>
                                            <p>{{ $route_details[0]->route_description_de }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                             <div class="card-header">
                          <form method="POST" action="{{route('add_point_of_interest')}}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <input type="hidden" name="route_id" value="{{ $route_details[0]->route_id }}"/>
                          
                <button class="btn btn-info float-right">Add Point Of Interest</button>
              
                                </form>
                        </div>
                                            <div class="table-responsive">
                                                <table id="example6" class="table route_table">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>SL.No</th>

                                                            <th>First Image</th>
                                                            <th>Place Name</th>
                                                            <th class="text-center">Audio</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for($k = 0; $k < count($poi_list); $k++)
                                                    
                                                  
                                                    <tr>
                                                        <td class="align-middle">{{$k+1}}</td>

                                                        <td class="align-middle"><img src="<?php echo url('/'); ?>/image_point_of_interest/{{ $poi_list[$k]->poi_img_1 }}"></td>
                                                        <td class="align-middle">{{ $poi_list[$k]->poi_name_de }}</td>
                                                        <td class="align-middle text-center"><audio controls="controls"
                                                                controlslist="nodownload">
                                                                <source src="<?php echo url('/'); ?>/audio_point_of_interest/{{ $poi_list[$k]->poi_audio_de }}"  />
                                                            </audio></td>

                                                        <td class="align-middle">
                                                            <a href="{{route('details_point_of_interest',['language'=>'de','poi_id'=> base64_encode($poi_list[$k]->poi_id)])}}"
                                                                class="btn btn-sm btn-info"
                                                                title="Add Point Of Interest"><i
                                                                    class="fa fa-eye"></i></a>
                                                            <a href="#" class="btn btn-sm btn-info" title="Edit"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <a style="color: white;" data-toggle="modal" data-target="#modal-de-{{$poi_list[$k]->poi_id}}" class="btn btn-sm btn-info" title="Delete"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
<div class="modal fade" id="modal-de-{{$poi_list[$k]->poi_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
     <div class="modal-header">
     
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form method="POST" action="all_type_delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <div class="message-txt text-center">
         <h4 class="text-uppercase font-weight-bold">Are you sure you want to delete!</h4>
         <h5>{{$poi_list[$k]->poi_name_de}}</h5>
         <input type="hidden" name="del_from" value="del_poi_list">
         <input type="hidden" name="poi_id" value="{{$poi_list[$k]->poi_id}}">
         <input type="hidden" name="route_id" value="{{$poi_list[$k]->route_id}}">
         <div class="yes-nobtn mt-4">
           <button  class="btn btn-sm" type="submit" style="background-color: #C68F60; color: #ffffff">Yes</button>
            <a data-dismiss="modal" class="btn btn-sm ml-2" style="background-color: #121212; color: #ffffff">No</a>
         </div>
       </div>
     </div>
   </form>
   </div>
 </div>
</div>
                                                    @endfor

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                  

                </div>
            </div>
     <!--        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="collapse" id="collapseExample">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-md-6 col-6 mt-2">
                                                <div class="place-img border p-2 text-center">
                                                    <label for="place_1"><img style="max-width: 100px;"
                                                            src="dist/img/photo.png" id="thumbnil"></label>
                                                    <input type="file" id="place_1" onchange="showMyImage(this)"
                                                        name="place1" style="display: none;">
                                                    <div class="set-label">
                                                        <label for="place_1"><i class="fa fa-camera"></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6 mt-2">
                                                <div class="place-img border p-2 text-center">
                                                    <label for="place_2"><img style="max-width: 100px;"
                                                            src="dist/img/photo.png" id="thumbnil2"></label>
                                                    <input type="file" id="place_2" onchange="showMyImage2(this)"
                                                        name="place2" style="display: none;">
                                                    <div class="set-label">
                                                        <label for="place_2"><i class="fa fa-camera"></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6 mt-2">
                                                <div class="place-img border p-2 text-center">
                                                    <label for="place_3"><img style="max-width: 100px;"
                                                            src="dist/img/photo.png" id="thumbnil3"></label>
                                                    <input type="file" id="place_3" onchange="showMyImage3(this)"
                                                        name="place3" style="display: none;">
                                                    <div class="set-label">
                                                        <label for="place_3"><i class="fa fa-camera"></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6 mt-2">
                                                <div class="place-img border p-2 text-center">
                                                    <label for="place_4"><img style="max-width: 100px;"
                                                            src="dist/img/photo.png" id="thumbnil4"></label>
                                                    <input type="file" id="place_4" onchange="showMyImage4(this)"
                                                        name="place4" style="display: none;">
                                                    <div class="set-label">
                                                        <label for="place_4"><i class="fa fa-camera"></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Place Name</label>
                                            <input type="text" class="form-control" placeholder="Place Name" name="">
                                        </div>
                                        <div class="form-group">
                                            <label>Add MP3 Audio File <i class="fa fa-music"></i></label>
                                            <input accept="audio/mp3" type="file" accept="MP3" name="en_fileAudio"
                                                value="" onchange="PreviewAudio(this, $('#audioPreview'))" />

                                            <audio controls="controls" id="audioPreview" style="display:none">
                                                <source src="" type="audio/mp4" />
                                            </audio>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" placeholder="Description" name="place_des"
                                                rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info float-left">+ Add point of interest</button>
                                <button class="btn btn-info float-right" type="button"
                                    onclick="return Upload()">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 -->

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">

    
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
<script>
  $(function () {
    $("#example4").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    $('#example5').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    $('#example6').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

});
</script>

@include('footer')
