@include('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Podcast</h1>
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
          <div class="col-md-12 col-sm-12 col-xs-12 col-lg-5"> 
            <div class="card">
            	<div class="card-header">
            		<h4 class="card-title">Podcast Image</h4>
            	</div>
            	<div class="card-body">
              <div class="banner-img-area border p-2 shadow">
                                        <a href="<?php echo url('/'); ?>/image_podcast/{{ $podcast_details[0]->pod_img }}"
                                            data-toggle="lightbox" data-title="Podcast Image"> <img class="d-block w-100"
                                                src="<?php echo url('/'); ?>/image_podcast/{{ $podcast_details[0]->pod_img }}"
                                                style=" height:400px; object-position: center; object-fit: cover;" ></a>
                                    </div>
               
            		<!-- <img class="d-block w-100"  src="<?php echo url('/'); ?>/image_podcast/{{ $podcast_details[0]->pod_img }}" style="cursor: pointer;"> -->
            	</div>
            </div>
          </div>
           <div class="col-md-12 col-sm-12 col-xs-12 col-lg-7"> 
            <div class="card">
            	<div class="card-header bg-dark">
            	
<ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-english" role="tab" aria-controls="pills-home" aria-selected="true">English</a>
  </li>
<!--   <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-frn" role="tab" aria-controls="pills-profile" aria-selected="false">French</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-german" role="tab" aria-controls="pills-contact" aria-selected="false">German</a>
  </li> -->
</ul>
            	</div>
            	<div class="card-body">
            		<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-english" role="tabpanel" aria-labelledby="pills-home-tab">
  	<h5>{{ $podcast_details[0]->pod_title_en }}</h5>
  	<div class="podcast-des mt-4">
  		<p>{{ $podcast_details[0]->pod_description_en }}</p>
  	</div>
    <div class="podcast-dur mt-4">
  		<p>{{ $podcast_details[0]->duration_in_min }}</p>
  	</div>
  	<div class="podcast-news mt-4">
  		<audio controls="controls" class="w-100" controlslist="nodownload">
                      <source src="<?php echo url('/'); ?>/audio_podcast/{{ $podcast_details[0]->pod_audio_en }}" type="audio/mp4" />
                       </audio>
  	</div>
  </div>
    <div class="tab-pane fade" id="pills-frn" role="tabpanel" aria-labelledby="pills-home-tab">
  		<h5>{{ $podcast_details[0]->pod_title_fr }}</h5>
  	<div class="podcast-des mt-4">
  		<p>{{ $podcast_details[0]->pod_description_fr }}</p>
  	</div>
    <div class="podcast-dur mt-4">
  		<p>{{ $podcast_details[0]->duration_in_min }}</p>
  	</div>
  	<div class="podcast-news mt-4">
  		<audio controls="controls" class="w-100" controlslist="nodownload">
                      <source src="<?php echo url('/'); ?>/audio_podcast/{{ $podcast_details[0]->pod_audio_fr }}" type="audio/mp4" />
                       </audio>
  	</div>
  </div>
  
   <div class="tab-pane fade" id="pills-german" role="tabpanel" aria-labelledby="pills-home-tab">
  	<h5>{{ $podcast_details[0]->pod_title_de }}</h5>
  	<div class="podcast-des mt-4">
  		<p>{{ $podcast_details[0]->pod_description_de }}</p>
  	</div>
    <div class="podcast-dur mt-4">
  		<p>{{ $podcast_details[0]->duration_in_min }}</p>
  	</div>
  	<div class="podcast-news mt-4">
  		<audio controls="controls" class="w-100" controlslist="nodownload">
                      <source src="<?php echo url('/'); ?>/audio_podcast/{{ $podcast_details[0]->pod_audio_de }}" type="audio/mp4" />
                       </audio>
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
  @include('footer')