@include('header')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Podcast</h1>
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
              <div class="card-header">
                <a href="{{route('add_podcast')}}" class="btn btn-info float-right">Add New Daily Route</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="list_brodcast" class="table route_table  table-striped">
                  <thead class="table-dark">
                    <tr>
                      <th>SL.No</th>
                      <th>Podcast</th>
                      <th>Title</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle">1</td>
                      <td class="align-middle"><img  src="dist/img/photo1.png"></td>
                      
                      <td class="align-middle">The Us President Election</td>
                     
                      <td class="align-middle">
                        <a href="{{route('view_podcast')}}" class="btn btn-sm btn-info" title="View"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a> 
                        <a href="#" class="btn btn-sm btn-info" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>

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
@include('footer')