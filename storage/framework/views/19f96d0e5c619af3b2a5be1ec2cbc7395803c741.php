  <?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-light" style="background-color: #C68F60;">
              <div class="inner">
                <h3><?php if(!empty($user_list)): ?>
                    <?php echo e($user_list['count']); ?>

                <?php else: ?>
                    
                <?php endif; ?>  </h3>

                <p>Active Users </p>
              </div>
              
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?php echo e(route('user_list')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-light" style="background-color: #C68F60;">
              <div class="inner">
                <h3><?php if(!empty($user_list)): ?>
                    <?php echo e($user_list['inactive_count']); ?>

                <?php else: ?>
                    
                <?php endif; ?>  </h3>

                <p>Inactive Users </p>
              </div>
              
              <div class="icon">
                <i class="fa fa-user-times"></i>
              </div>
              <a href="<?php echo e(route('user_list')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-light" style="background-color: #C68F60;">
              <div class="inner">
                <h3><?php if(!empty($route_list)): ?>
                    <?php echo e($route_list['count']); ?>

                <?php else: ?>
                    
                <?php endif; ?></h3>

                <p>Daily Routes</p>
              </div>
              <div class="icon">
                <i class="fas fa-map"></i>
              </div>
              <a href="<?php echo e(route('daily_route_list')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
