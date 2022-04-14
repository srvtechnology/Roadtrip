@include('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Los Angeles to Laughlin</h1>
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
                         <a href="<?php echo url('/'); ?>/dist/img/photo1.png" data-toggle="lightbox" data-title="Daily Route Banner"> <img class="d-block w-100" src="<?php echo url('/'); ?>/dist/img/photo1.png" style="height: 200px; object-position: center; object-fit: cover;"></a>
                         <p class="mt-2">Daily Route Banner</p>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="banner-img-area border p-2 shadow">
                         <a href="<?php echo url('/'); ?>/dist/img/map.jpg" data-toggle="lightbox" data-title="Daily Route Map"> <img class="d-block w-100" src="<?php echo url('/'); ?>/dist/img/map.jpg" style="height: 200px; object-position: center; object-fit: cover;"></a>
                         <p class="mt-2" >Daily Route Map</p>
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
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-english" role="tab" aria-controls="pills-english" aria-selected="true">English</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-french" role="tab" aria-controls="pills-profile" aria-selected="false">French</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-german" role="tab" aria-controls="pills-contact" aria-selected="false">German</a>
  </li>
</ul>
              </div>
      				<div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-english" role="tabpanel">
                    <div class="row">
                     
                      <div class="col-md-12 col-sm-12 col-lg-6">
                        <div class="table-responsive">
                        <table class="table table-borderless">
                          <tbody>
                            <tr>
                              <th class="align-middle">Daily Route Type:</th><td class="align-middle">Clockwise</td>
                            </tr>
                            <tr>
                              <th class="align-middle">Daily Route Title:</th><td class="align-middle">Los angeles to Las vegas</td>
                            </tr>
                           
                            <tr>
                              <th class="align-middle">Daily Route Audio:</th><td class="align-middle">  <audio controls="controls">
                      <source src="dist/audio.mp3" type="audio/mp4" />
                       </audio></td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                      </div>

                       <div class="col-md-6 col-sm-12 col-xs-12">
                       <h5>Description</h5>
                       <p>  ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                       consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                       cillum dolore eu fugiat nulla pariatur.</p>
                        <a href="{{route('add_pointofinterest')}}" class="btn btn-info float-right">+ Add Point Of Interest</a>
                      </div>
                    </div>
                    


                    <div class="row">
                      <div class="col-md-12">
                         <table id="table_eng" class="table route_table">
                  <thead class="table-light">
                    <tr>
                      <th>SL.NO</th>
                      
                      <th>POI</th>
                      <th>POI Name</th>
                      <th class="text-center">POI Audio</th>
                      <th>POI Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle">1</td>
                  
                      <td class="align-middle"><img  src="dist/img/photo1.png"></td>
                      <td class="align-middle">Los Angeles</td>
                      <td class="align-middle text-center"><audio controls="controls">
                      <source src="dist/audio.mp3" type="audio/mp4" />
                       </audio></td>
                    
                      <td class="align-middle">
                        <a href="{{route('details_pointofinterest')}}" class="btn btn-sm btn-info" title="Add Point Of Interest"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a> 
                        <a href="#" class="btn btn-sm btn-info" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>

                  </tbody>
                </table>
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-french" role="tabpanel">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-lg-6">
                        <div class="table-responsive">
                        <table class="table table-borderless">
                          <tbody>
                            <tr>
                              <th class="align-middle">Daily Route Type:</th><td class="align-middle">Clockwise</td>
                            </tr>
                            <tr>
                              <th class="align-middle">Daily Route Title:</th><td class="align-middle">Los angeles to Las vegas</td>
                            </tr>
                           
                            <tr>
                              <th class="align-middle">Daily Route Audio:</th><td class="align-middle">  <audio controls="controls">
                      <source src="dist/audio.mp3" type="audio/mp4" />
                       </audio></td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                      </div>
                      <div class="col-sm-12 col-lg-6 col-xs-12 col-md-12">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                       <h5>Description</h5>
                       <p>  ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                       consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                       cillum dolore eu fugiat nulla pariatur.</p>
                        <a href="{{route('add_pointofinterest')}}" class="btn btn-info float-right">+ Add Point Of Interest</a>
                      </div>
                      </div>
                    </div>
                    
                      
                    
                    <div class="row mt-2">
                      <div class="col-md-12">
                        <div class="table-responsive">
                         <table id="table_frn" class="table route_table">
                  <thead class="table-light">
                   <tr>
                      <th>SL.NO</th>
                      
                      <th>POI</th>
                      <th>POI Name</th>
                      <th class="text-center">POI Audio</th>
                      <th>POI Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle">1</td>
                  
                      <td class="align-middle"><img  src="dist/img/photo1.png"></td>
                      <td class="align-middle">Los Angeles</td>
                      <td class="align-middle text-center"><audio controls="controls">
                      <source src="dist/audio.mp3" type="audio/mp4" />
                       </audio></td>
                    
                      <td class="align-middle">
                        <a href="details_pointofinterest.html" class="btn btn-sm btn-info" title="Add Points Of Interest"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a> 
                        <a href="#" class="btn btn-sm btn-info" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
                      </div>
                    </div>
                </div>
                   <div class="tab-pane fade" id="pills-german" role="tabpanel">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-lg-6">
                        <table class="table table-borderless">
                          <tbody>
                            <tr>
                              <th class="align-middle">Daily Route Type:</th><td class="align-middle">Clockwise</td>
                            </tr>
                            <tr>
                              <th class="align-middle">Daily Route Title:</th><td class="align-middle">Los angeles to Las vegas</td>
                            </tr>
                           
                            <tr>
                              <th class="align-middle">Daily Route Audio:</th><td class="align-middle">  <audio controls="controls">
                      <source src="dist/audio.mp3" type="audio/mp4" />
                       </audio></td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                      <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
                       <h5>Description</h5>
                       <p>  ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                       consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                       cillum dolore eu fugiat nulla pariatur.</p>
                        <a href="{{route('add_pointofinterest')}}" class="btn btn-info float-right">+ Add Point Of Interest</a>
                       
                      </div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-md-12">
                        <div class="table-responsive">
                         <table id="table_german" class="table route_table">
                  <thead class="table-light">
                   <tr>
                      <th>SL.NO</th>
                      
                      <th>POI</th>
                      <th>POI Name</th>
                      <th class="text-center">POI Audio</th>
                      <th>POI Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle">1</td>
                  
                      <td class="align-middle"><img  src="dist/img/photo1.png"></td>
                      <td class="align-middle">Lon angeles</td>
                      <td class="align-middle text-center"><audio controls="controls">
                      <source src="dist/audio.mp3" type="audio/mp4" />
                       </audio></td>
                    
                      <td class="align-middle">
                        <a href="{{route('details_pointofinterest')}}" class="btn btn-sm btn-info" title="View Point Of Interest"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a> 
                        <a href="#" class="btn btn-sm btn-info" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>

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
              

        
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('footer')
<script type="text/javascript">
    $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
  </script>