@include('header')

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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{route('add_daily_route')}}" class="btn btn-info float-right">Add New Daily Route</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="list_dailyroute" class="table route_table  table-striped">
                  <thead class="table-dark">
                    <tr>
                      <th>SL.NO</th>
                      <th>Daily Route Banner</th>
                      <th>Daily Route Map</th>
                      <th>Daily Route Title</th>
                      <th>Daily Route Type</th>
                      <th>Daily Route Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle">1</td>
                      <td class="align-middle"><img  src="dist/img/photo1.png"></td>
                      <td class="align-middle"><img  src="dist/img/map.jpg"></td>
                      <td class="align-middle">Los Angeles to Laughlin</td>
                      <td class="align-middle">Anti Clockwise</td>
                      <td class="align-middle">
                        <a href="{{route('view_daily_route')}}" class="btn btn-sm btn-info" title="View &amp; add Point Of Interest"><i class="fa fa-eye"></i></a>
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
