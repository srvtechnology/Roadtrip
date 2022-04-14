@include('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Daily Route</h1>
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
          <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12"> 
            <div class="card">
              <div class="card-header">
                 <div class="form-group col-md-6">
                    <label> Daily Route Type</label>
                    <select class="form-control" name="en_type">
                      <option> Choose Type</option>
                      <option value="Clockwise">Clockwise</option>
                      <option value="Anti Clockwise">Anti Clockwise</option>
                    </select>
                  </div>
              </div>
              <div class="card-body">
                 <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Add Daily Route Banner Image</label>
                    <div class="phto-set border pt-2 pb-2 text-center" style="height: 150px;">
                    <label for="banner-img"><img  src="dist/img/photo.png" id="thumbnil" style="max-height:100px;"></label>
                     <div class="set-label">
                  <label for="banner-img"><i class="fa fa-camera"></i></label>
                </div>
                    </div>
                    <input type="file" id="banner-img"  name="banner_img" onchange="showMyImage(this)" style="display: none;">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Add Daily Route Map Image</label>
                    <div class="phto-set border pt-2 pb-2 text-center">
                    <label for="map-img"><img  src="dist/img/photo.png" id="thumbnil2" style="max-height:100px;"></label>
                    <div class="set-label">
                  <label for="map-img"><i class="fa fa-camera"></i></label>
                </div>
                    </div>
                    <input type="file" id="map-img"  name="map_img" onchange="showMyImage2(this)" style="display: none;">
                  </div>
                </div>
              </div>
              <div class="card-footer bg-dark">
                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-english" role="tab" aria-controls="pills-home" aria-selected="true">English</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-frence" role="tab" aria-controls="pills-profile" aria-selected="false">Frence</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-german" role="tab" aria-controls="pills-contact" aria-selected="false">German</a>
  </li>
</ul>
              </div>
            </div>

          </div>
        </div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-english">
            <form>
              <div class="card">
                <div class="card-header bg-dark">
                  <h5 class="card-title">English</h5>
                </div>
                <div class="card-body">
              
                  <div class="form-group">
                    <label>Add Daily Route  Audio <i class="fa fa-music"></i> </label> <br>
                    <label for="en-audio" class="btn btn-info">Upload <i class="fa fa-upload"></i></label>
                    <input id="en-audio" accept="audio/m4a" type="file"  name="en_fileAudio" value="" onchange="PreviewAudio(this, $('#audioPreview'))" style="display: none;" />
                     <small id="emailHelp" class="form-text text-muted">(Accept Only M4A Audio)</small>

                      <audio controls="controls" id="audioPreview" style="display:none">
                      <source src="" type="audio/m4a" />
                       </audio>
                  </div>
                  <div class="form-group">
                    <label>Add Daily Route Title</label>
                    <input type="text" class="form-control" placeholder="Add Add Daily Route Title" maxlength="120" name="en_Add Daily Route Title">
                  </div>

                  <div class="form-group">
                    <label>Daily Route Description</label>
                    <textarea class="form-control" name="en_des" rows="2" placeholder=" Daily Route Description (Maximum 200 Characters)" maxlength="200"></textarea>
                  </div>
                  
               
                </div>
                <div class="card-footer">
                  <input type="submit" class="btn btn-secondary w-100" value="Submit" name="">
                </div>
              </div>
            </form>
             </div>
             <div class="tab-pane fade" id="pills-frence">
            <form>
              <div class="card">
                <div class="card-header bg-dark">
                  <h5 class="card-Add Daily Route Title">Franchise</h5>
                </div>
                <div class="card-body">
              
                  <div class="form-group">
                   <label>Add Daily Route  Audio <i class="fa fa-music"></i> </label> <br>
                    <label for="frn-audio" class="btn btn-info">Upload <i class="fa fa-upload"></i></label>
                    <input id="frn-audio" accept="audio/m4a" type="file"  name="fn_fileAudio" value="" onchange="PreviewAudio2(this, $('#audioPreview2'))" style="display: none;" />
                    <small id="emailHelp" class="form-text text-muted">(Accept Only M4A Audio)</small>

                      <audio controls="controls" id="audioPreview2" style="display:none">
                      <source src="" type="audio/m4a" />
                       </audio>
                  </div>
                  <div class="form-group">
                    <label>Add Daily Route Title</label>
                    <input type="text" class="form-control" placeholder="Add Daily Route Title" maxlength="120" name="fn_title">
                  </div>

                  <div class="form-group">
                    <label>Daily Route Description</label>
                    <textarea class="form-control" name="fn_des" rows="2" placeholder="Daily Route Description (Maximum 200 Characters)" maxlength="200"></textarea>
                  </div>
                  
               
                </div>
                 <div class="card-footer">
                  <input type="submit" class="btn btn-secondary w-100" value="Submit" name="">
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-german">
            <form>
              <div class="card">
                <div class="card-header bg-dark">
                  <h5 class="card-title">German</h5>
                </div>
                <div class="card-body">
              
                  <div class="form-group">
                    <label>Add Daily Route  Audio <i class="fa fa-music"></i> </label> <br>
                     <label for="ger-audio" class="btn btn-info">Upload <i class="fa fa-upload"></i></label>
                    <input id="ger-audio" accept="audio/m4a" type="file"  name="gr_fileAudio" value="" onchange="PreviewAudio3(this, $('#audioPreview3'))"  style="display: none;" />
                    <small id="emailHelp" class="form-text text-muted">(Accept Only M4A Audio)</small>

                      <audio controls="controls" id="audioPreview3" style="display:none">
                      <source src="" type="audio/m4a" />
                       </audio>
                  </div>
                  <div class="form-group">
                    <label>Titel</label>
                    <input type="text" class="form-control" placeholder="Titel hinzufügen" maxlength="120" name="gr_title">
                  </div>

                  <div class="form-group">
                    <label>Daily Route Description</label>
                    <textarea class="form-control" name="gr_des" rows="2" placeholder="Daily Route Description (Maximum 200 Characters)" maxlength="200"></textarea>
                  </div>
                  
               
                </div>
                <div class="card-footer">
                  <input type="submit" class="btn btn-secondary w-100" value="Submit" name="">
                </div>
              </div>
            </form>
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
