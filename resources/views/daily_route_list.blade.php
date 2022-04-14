@include('header')
<style type="text/css">
	.tab-dailyroute .nav-item .nav-link{
		color: #101010!important
	}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daily Routes</h1>
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
          <div class="col-12">
            <div class="card card-primary card-outline card-tabs">
               @include('messages')
              <div class="card-header">
                <a href="{{route('add_daily_route')}}" class="btn btn-info float-right">Add New Daily Route</a>
              </div> 	
              <div class="card-header p-0 pt-1 border-bottom-0" style="display: flex; justify-content: space-between;">
                <ul class="nav nav-tabs tab-dailyroute" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-all" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-clockwise" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Clockwise</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-anticlock" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Anticlockwise</a>
                  </li>
                </ul>
                
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                 <div class="tab-pane fade show active" id="custom-tabs-three-all" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    <table id="list_daily_route_all" class="table route_table  table-striped">
                        <thead class="table-dark">
                            <tr>
                             <th>SL.No</th>
                             <th>Daily Route Banner</th>
                             <th>Daily Route Map</th>
                             <th>Daily Route Title</th>
                             <th>Daily Route Type</th>
                             <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                          @for($i = 0; $i < count($route_list); $i++)
                        		<td class="align-middle">{{$i+1}}</td>
                        		<td class="align-middle"><img  src="<?php echo url('/'); ?>/image_route/{{$route_list[$i]->route_top_banner_img}}"></td>
                        		<td class="align-middle"><img  src="<?php echo url('/'); ?>/image_route/{{$route_list[$i]->route_map_banner_img}}"></td>
                        		<td class="align-middle">{{$route_list[$i]->route_title_en}}</td>
                        		<td class="align-middle">@if ($route_list[$i]->route_type=="0")
                                                                 Clockwise 
                                                              @else
                                                                  Anticlockwise
                                                              @endif</td>
                        		<td class="align-middle"><form method="POST" action="{{route('view_point_of_interest')}}"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="route_id" value="{{$route_list[$i]->route_id}}"/>
                        <button class="btn btn-sm btn-info" title="View &amp; add Point Of Interest"><i class="fa fa-eye"></i></button>
                     
                        <a href="{{route('edit_daily_route',['route_id'=>base64_encode($route_list[$i]->route_id)])}}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a> 
                        <a style="color: white;" data-toggle="modal" data-target="#modal-{{$route_list[$i]->route_id}}" class="btn btn-sm btn-info" title="Delete"><i class="fa fa-trash"></i></a>
                        </form></td>
                        	</tr>

                           <!-- Modal -->
<div class="modal fade" id="modal-{{$route_list[$i]->route_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
         <h4 class="text-uppercase font-weight-bold">Are you sure you want to delete ?</h4>
         <h5>{{$route_list[$i]->route_title_en}}</h5>
         <input type="hidden" name="del_from" value="del_route_list">
         <input type="hidden" name="route_id" value="{{$route_list[$i]->route_id}}">
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
                  <div class="tab-pane fade" id="custom-tabs-three-clockwise" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                      <table id="list_daily_route_clockwise" class="table route_table  table-striped">
                        <thead class="table-dark">
                            <tr>
                             <th>SL.No</th>
                             <th>Daily Route Banner</th>
                             <th>Daily Route Map</th>
                             <th>Daily Route Title</th>
                             <th>Daily Route Type</th>
                             <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $j=1 ?>
                        @for($i = 0; $i < count($route_list); $i++)
                        
                        @if ($route_list[$i]->route_type=="0")
                                                                                     
                        	<tr>
                        		<td class="align-middle">{{$j}}<?php $j=$j+1 ?></td>
                        		<td class="align-middle"><img  src="<?php echo url('/'); ?>/image_route/{{$route_list[$i]->route_top_banner_img}}"></td>
                        		<td class="align-middle"><img  src="<?php echo url('/'); ?>/image_route/{{$route_list[$i]->route_map_banner_img}}"></td>
                        		<td class="align-middle">{{$route_list[$i]->route_title_en}}</td>
                        		<td class="align-middle">Clockwise</td>
                        		<td class="align-middle"><form method="POST" action="{{route('view_point_of_interest')}}"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="route_id" value="{{$route_list[$i]->route_id}}"/>
                        <button class="btn btn-sm btn-info" title="View &amp; add Point Of Interest"><i class="fa fa-eye"></i></button>
                     
                        <a href="{{route('edit_daily_route',['route_id'=>base64_encode($route_list[$i]->route_id)])}}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a> 
                        <a style="color: white;" data-toggle="modal" data-target="#modalclock-{{$route_list[$i]->route_id}}" class="btn btn-sm btn-info" title="Delete"><i class="fa fa-trash"></i></a>
                        </form></td>
                        	</tr>

                              <!-- Modal -->
                      <div class="modal fade" id="modalclock-{{$route_list[$i]->route_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
         <h4 class="text-uppercase font-weight-bold">Are you sure you want to delete ?</h4>
         <h5>{{$route_list[$i]->route_title_en}}</h5>
         <input type="hidden" name="del_from" value="del_route_list">
         <input type="hidden" name="route_id" value="{{$route_list[$i]->route_id}}">
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
                          @endif
                          @endfor
                        </tbody>
                    </table> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-anticlock" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                     <table id="list_daily_route_anticlock" class="table route_table  table-striped">
                        <thead class="table-dark">
                            <tr>
                             <th>SL.No</th>
                             <th>Daily Route Banner</th>
                             <th>Daily Route Map</th>
                             <th>Daily Route Title</th>
                             <th>Daily Route Type</th>
                             <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $j=1 ?>
                        @for($i = 0; $i < count($route_list); $i++)
                        @if ($route_list[$i]->route_type!="0")
                                                                                     
                        	<tr>
                        		<td class="align-middle">{{$j}}<?php $j=$j+1 ?></td>
                        		<td class="align-middle"><img  src="<?php echo url('/'); ?>/image_route/{{$route_list[$i]->route_top_banner_img}}"></td>
                        		<td class="align-middle"><img  src="<?php echo url('/'); ?>/image_route/{{$route_list[$i]->route_map_banner_img}}"></td>
                        		<td class="align-middle">{{$route_list[$i]->route_title_en}}</td>
                        		<td class="align-middle">Anticlockwise</td>
                        		<td class="align-middle"> <form method="POST" action="{{route('view_point_of_interest')}}"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="route_id" value="{{$route_list[$i]->route_id}}"/>
                        <button class="btn btn-sm btn-info" title="View &amp; add Point Of Interest"><i class="fa fa-eye"></i></button>
                     
                        <a href="{{route('edit_daily_route',['route_id'=>base64_encode($route_list[$i]->route_id)])}}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a> 
                        <a style="color: white;" data-toggle="modal" data-target="#modalanti-{{$route_list[$i]->route_id}}" class="btn btn-sm btn-info" title="Delete"><i class="fa fa-trash"></i></a>
                        </form> </td>
                        	</tr>


                               <!-- Modal -->
                      <div class="modal fade" id="modalanti-{{$route_list[$i]->route_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
         <h4 class="text-uppercase font-weight-bold">Are you sure you want to delete ?</h4>
         <h5>{{$route_list[$i]->route_title_en}}</h5>
         <input type="hidden" name="del_from" value="del_route_list">
         <input type="hidden" name="route_id" value="{{$route_list[$i]->route_id}}">
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
                          @endif
                          @endfor
                        </tbody>
                    </table> 
                  </div>
                 
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>



       
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
  $(function () {
  
    $('#list_daily_route').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "render":true,
      /* 'columnDefs': [{ 'orderable': false, 'targets': 2 }], // hide sort icon on header of first column
     'aaSorting': [[0, 'asc']], // start to sort data in second column */

      
    });
  });
</script>
<script>
  $(function () {
  
    $('#list_daily_route_all').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      language: {
        searchPlaceholder: "Search  Daily Route Title"
    },
      "autoWidth": false,
      "responsive": true,
      "render":true,
      /* 'columnDefs': [{ 'orderable': false, 'targets': 2 }], // hide sort icon on header of first column
     'aaSorting': [[0, 'asc']], // start to sort data in second column */

      
    });
  });
</script>
<script>
  $(function () {
  
    $('#list_daily_route_clockwise').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      language: {
        searchPlaceholder: "Search  Daily Route Title"
    },
      "autoWidth": false,
      "responsive": true,
      "render":true,
      /* 'columnDefs': [{ 'orderable': false, 'targets': 2 }], // hide sort icon on header of first column
     'aaSorting': [[0, 'asc']], // start to sort data in second column */

      
    });
  });
</script>
<script>
  $(function () {
  
    $('#list_daily_route_anticlock').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
       language: {
        searchPlaceholder: "Search Daily Route Title"
    },
      "autoWidth": false,
      "responsive": true,
      "render":true,
      /* 'columnDefs': [{ 'orderable': false, 'targets': 2 }], // hide sort icon on header of first column
     'aaSorting': [[0, 'asc']], // start to sort data in second column */

      
    });
  });
</script>
@include('footer')


