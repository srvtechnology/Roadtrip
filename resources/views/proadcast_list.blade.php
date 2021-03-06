@include('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Podcast List</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              @include('messages')
              <div class="card-header">
                <a href="{{route('add_podcast')}}" class="btn btn-info float-right">Add Podcast</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="pod_list_brodcast" class="table route_table  table-striped">
                  <thead class="table-dark">
                    <tr>
                      <th>SL.No</th>
                      <th>Podcast</th>
                      <th>Title</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="popup-gallery">
                    @for($i = 0; $i < count($podcast_list); $i++)
                      
                    
                    <tr>
                      <td class="align-middle">{{$i+1}}</td>
                      <td class="align-middle"><a href="<?php echo url('/'); ?>/image_podcast/{{ $podcast_list[$i]->pod_img}}" class="test-popup-link"><img  src="<?php echo url('/'); ?>/image_podcast/{{ $podcast_list[$i]->pod_img}}"></a></td>
                      
                      <td class="align-middle">{{ $podcast_list[$i]->pod_title_en}}</td>
                     
                      <td class="align-middle">
                        <a href="{{route('view_podcast',['pod_id'=> base64_encode($podcast_list[$i]->pod_id)])}}" class="btn btn-sm btn-info" title="View"><i class="fa fa-eye"></i></a>
                        <a href="{{route('edit_podcast',['pod_id'=>base64_encode($podcast_list[$i]->pod_id)])}}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a> 
                        <a style="color: white;" data-toggle="modal" data-target="#modal-{{$podcast_list[$i]->pod_id}}" class="btn btn-sm btn-info" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>

<div class="modal fade" id="modal-{{$podcast_list[$i]->pod_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
         <h4 class="text-uppercase font-weight-bold">Do You Want to Delete?</h4>
         <h5>{{$podcast_list[$i]->pod_title_en}}</h5>
         <input type="hidden" name="del_from" value="del_podcast_list">
         <input type="hidden" name="pod_id" value="{{$podcast_list[$i]->pod_id}}">
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
  
    $('#pod_list_brodcast').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      /* 'columnDefs': [{ 'orderable': false, 'targets': 2 }], // hide sort icon on header of first column
     'aaSorting': [[0, 'asc']], // start to sort data in second column */



    });
  });

  
</script>

 <!-- <script type="text/javascript">
  /*magnificPopup*/
$(document).ready(function() {
  $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: false,
      navigateByImgClick: false,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return item.el.attr('title') + '<small>By RoadTrip </small>';
      }
    }
  });
});

</script> -->
@include('footer')
