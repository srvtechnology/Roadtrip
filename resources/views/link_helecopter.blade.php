@include('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Helecopter Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">package</li>
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
             <!--  <div class="card-header">
                <a href="{{route('add_daily_route')}}" class="btn btn-info float-right">Add New Daily Route</a>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label for="">Add Link</label>
                    <input type="text" name="" id="" value="" class="form-control" placeholder="https://">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-info">Update</button>
                  </div>
                </form>
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
