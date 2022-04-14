 @include('header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
              <!-- <div class="card-header">
                <h3 class="card-title">User List</h3>
              </div> -->
              <!-- /.card-header -->
               
              <div class="card-body">
                <table id="example1" class="table user-table  table-striped">
                  <thead class="table-dark">
                    <tr>
                      <th>SL. No.</th>
                      <th>User Image</th>
                      <th>Name</th>
                      <th>E-mail</th>
                     
                      <th>Register type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                   @if (!empty($user_list))
                   @for($i = 0; $i < count($user_list); $i++)
                     <tr>
                      <td class="align-middle">{{$i+1}}</td>
                      <td class="align-middle">
                        @if(!empty($user_list[$i]->profile_pic))
                            <img src="<?php echo url('/');?>/images/{{$user_list[$i]->profile_pic}}">
                            @else
                            <img src="dist/img/user.svg">
                        @endif
                        </td>
                      <td class="align-middle">{{$user_list[$i]->name}}</td>
                      <td class="align-middle">{{$user_list[$i]->email}}</td>
                     
                      <td class="align-middle">
                        <?php 
                          if ($user_list[$i]->signup_type=="GP") {
                            # code...
                            echo "Google";
                          } elseif ($user_list[$i]->signup_type=="FB") {
                            # code...
                            echo "Facebook";
                          } else {
                            # code...
                            echo "Normal";
                          }
                          
                        ?>
                       </td>
                       <td class="align-middle"><label class="switch">
  <input type="hidden" name="user_id" value="{{$user_list[$i]->user_id}}">

  @if($user_list[$i]->user_active_status==1)
  <input name="checkbox" value="{{$user_list[$i]->user_id}}"  id="checkbox"  type="checkbox" checked="">
  
  @else
  <input name="checkbox" value="{{$user_list[$i]->user_id}}"  id="checkbox"  type="checkbox">

  @endif
  
  <span class="slider round"></span>
</label></td>
                    </tr>
                   @endfor    
                   @endif
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
  <button type="button" id="alert_true" class="btn btn-default toastsDefaultAutohideinfo">
                  info alert
                </button>
                 <button type="button" id="alert_false" class="btn btn-default dangeralert">
                  danger alert
                </button>
  <script>
   $(document).ready(function() {
    $("#alert_true").hide();
     $("#alert_false").hide();
   
    
});
   </script>
  <script>
  $(function() {
    
    $('.toastsDefaultAutohideinfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'User Activated',
        //position:'',
        autohide: true,
        delay: 2000
        // body: 'User Activated'
      })
    });


        $('.dangeralert').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'User Deactivated',
        //position:'',
        autohide: true,
        delay: 2000
        // body: 'User Deactivated'
      })
    });


  });
</script>
  <script>

$("input:checkbox").on("change", function () {
    var val = $(this).val();
    var user_id=  $('input[name="user_id"]').val();
    var checkboxstatus = $(this).is(':checked') ? 1 : 0;
    $.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
    $.ajax({
        type: "POST",
        url: "change_status",
        data: {user_id:val, status: checkboxstatus},
        success: function(response) {
                var flag = response['flag'];
                var message = response['message'];
                if (flag=='true') {
                  $("#alert_true").click();
   
                }else{

          $("#alert_false").click();
                }
     
             }
    });
});
</script>

<script type="text/javascript">
  

  $(function () {

    $("#list_dailyroute").DataTable({
        "lengthChange": false,
         "searching": false,
      "responsive": true,
      "autoWidth": false,
      "ordering":false,
      "info":true,
             language: {
        searchPlaceholder: "Search.."
    }
       //'columnDefs': [{ 'orderable': false, 'targets': 1 }], // hide sort icon on header of first column
     //'aaSorting': [[0, 'asc']] // start to sort data in second column 
    });

     $("#table_frn").DataTable({
        "lengthChange": false,
         "searching": false,
      "responsive": true,
      "autoWidth": false,
      "ordering":false,
      "info":true,
             language: {
        searchPlaceholder: "Search.."
    }
       //'columnDefs': [{ 'orderable': false, 'targets': 1 }], // hide sort icon on header of first column
     //'aaSorting': [[0, 'asc']] // start to sort data in second column 
    });

     $("#table_german").DataTable({
        "lengthChange": false,
         "searching": false,
      "responsive": true,
      "autoWidth": false,
      "ordering":false,
      "info":true,
             language: {
        searchPlaceholder: "Search.."
    }
       //'columnDefs': [{ 'orderable': false, 'targets': 1 }], // hide sort icon on header of first column
     //'aaSorting': [[0, 'asc']] // start to sort data in second column 
    });

     $("#table_eng").DataTable({
        "lengthChange": false,
         "searching": false,
      "responsive": true,
      "autoWidth": false,
      "ordering":false,
      "info":true,
             language: {
        searchPlaceholder: "Search.."
    }
       //'columnDefs': [{ 'orderable': false, 'targets': 1 }], // hide sort icon on header of first column
     //'aaSorting': [[0, 'asc']] // start to sort data in second column 
    });
    $("#example1_new").DataTable({
   
      "responsive": true,
      "autoWidth": false,
      "ordering":true,
      "info":true,
             language: {
        searchPlaceholder: "Search.."
    }
       //'columnDefs': [{ 'orderable': false, 'targets': 1 }], // hide sort icon on header of first column
     //'aaSorting': [[0, 'asc']] // start to sort data in second column 
    });

        $("#list_brodcast").DataTable({
      "responsive": true,
      "autoWidth": false,
      "ordering":true,
      "info":true,
             language: {
        searchPlaceholder: "Search.."
    }
       //'columnDefs': [{ 'orderable': false, 'targets': 1 }], // hide sort icon on header of first column
     //'aaSorting': [[0, 'asc']] // start to sort data in second column 
    });

    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    
  });
</script>
 @include('footer')

