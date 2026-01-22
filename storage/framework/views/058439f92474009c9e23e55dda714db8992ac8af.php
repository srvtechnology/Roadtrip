<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style type="text/css">
    .bg-theme {
        background-color: #c68f60;
        color: #fff;
    }

    .modal-body ul {
        list-style-type: none;
        padding-left: 0px;
        margin: 0 -15px;
    }

    .modal-body ul li {
        margin: 0 15px;
        display: inline-block;
    }

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Package List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
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
                    <?php echo $__env->make('messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="card-header">
                            <a href="<?php echo e(route('list_package_add')); ?>" class="btn btn-info float-right">Add New </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="list_dailyroute" class="table route_table  table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>SL.NO</th>
                                        <th>Package Image</th>
                                        <th>Active Package</th>
                                        <th>Package Name</th>
                                        <th>Price</th>
                                        <th>Daily Routes</th>
                                        <th>Podcasts</th>
                                        <th>Sequence</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $user_package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="align-middle"><?php echo e($index + 1); ?></td>
                                            <td class="align-middle"><a href="<?php echo url('/'); ?>/package_images/<?php echo e($package->package_image); ?>" target="_blank"> <img class="shadow" style="width:60px; height:60px; object-fit: cover; object-position: center;"  src="<?php echo url('/'); ?>/package_images/<?php echo e($package->package_image); ?>"></a></td>
                                            <td class="align-middle"><a href="<?php echo url('/'); ?>/package_images/<?php echo e($package->active_image); ?>" target="_blank"><img class="shadow"  style="width:60px; height:60px; object-fit: cover; object-position: center;"  src="<?php echo url('/'); ?>/package_images/<?php echo e($package->active_image); ?>"></a></td>
                                            <td class="align-middle"><?php echo e($package->package_name); ?></td>
                                            <td class="align-middle"><i
                                                    class="fa fa-usd"></i><?php echo e($package->package_price); ?> USD</td>
                                            <td class="align-middle abc">
                                                <?php $__currentLoopData = $package->pack; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo $index + 1 . '. ' . $route->route_title_en . '<br>'; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td class="align-middle">
                                                <?php $__currentLoopData = $package->packs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $podcasts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo $index + 1 . '. ' . $podcasts->pod_title_en . '<br>'; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>

                                            <td class="align-middle">
                                                <?php echo e($package->sequence); ?>

                                            </td>

                                            <td class="align-middle" style="width: 120px;">

                                                <a href="<?php echo e(route('list_package_edit', $package->package_id)); ?>"
                                                    class="btn btn-sm btn-info" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                               <!--  <button type="button" data-toggle="modal"  data-target="#view_<?php echo e($package->id); ?>"
                                                    class="btn  btn-sm btn-info"><i class="fa fa-trash"></i></button> -->
                                                    <a style="color: white;" data-toggle="modal" data-target="#modal-<?php echo e($package->package_id); ?>" class="btn btn-sm btn-info" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <!-- <td class="align-middle">
                        <a href="<?php echo e(route('list_package_edit', ['package_id' => base64_encode($package->package_id)])); ?>" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a> 
                      </td> -->
                                        </tr>

                                        <div class="modal fade" id="modal-<?php echo e($package->package_id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
     <div class="modal-header">
     
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form method="POST" action="all_type_delete">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
       <div class="message-txt text-center">
         <h4 class="text-uppercase font-weight-bold">Do You Want to Delete?</h4>
         <h5><?php echo e($package->package_name); ?></h5>
         <!-- <input type="hidden" name="del_from" value="del_package_list">
         <input type="hidden" name="package_id" value="<?php echo e($package->package_id); ?>"> -->
         <div class="yes-nobtn mt-4">
            <a href="<?php echo e(route('deletePackage',$package->package_id)); ?>" class="btn btn-sm"  title="Delete" style="background-color: #C68F60; color: #ffffff">Yes</i></a>
           <!-- <button  class="btn btn-sm" type="submit" style="background-color: #C68F60; color: #ffffff">Yes</button> -->
            <a data-dismiss="modal" class="btn btn-sm ml-2" style="background-color: #121212; color: #ffffff">No</a>
         </div>
       </div>
     </div>
   </form>
   </div>
 </div>
</div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<!-- Modal -->
<!-- <div class="modal fade" id="view_" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-theme">
                <h5 class="modal-title text-center" id="exampleModalLabel">Are you sure want to delete?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul style="list-style-type: none; text-align: center;">
                    <li><a href="" class="btn btn-sm btn-success"><i
                                class="fa fa-check"></i></a></li>
                    <li><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></li>
                </ul>
            </div>

        </div>
    </div>
</div> -->
<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
