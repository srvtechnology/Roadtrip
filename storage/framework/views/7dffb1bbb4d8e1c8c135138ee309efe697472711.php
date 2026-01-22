<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Payment</li>
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
                <a href="<?php echo e(route('add_dailyroute_map')); ?>" class="btn btn-info float-right">Add New Daily Route Map</a>
              </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="list_payment" class="table route_table  table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Package</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $user_payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="align-middle"><?php echo e($index + 1); ?></td>
                                            <td class="align-middle"><?php $__currentLoopData = $payment->pay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($pays->name); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                            <td class="align-middle"><?php $__currentLoopData = $payment->pay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($pays->email); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                            <td class="align-middle"><?php $__currentLoopData = $payment->packs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($payments->package_name); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                            <td class="align-middle"><?php echo e($payment->created_at->format('d-m-Y')); ?></td>
                                            <td class="align-middle"><?php echo e($payment->payment_amount); ?> USD</td>
                                            
                                        </tr>
                                        <div class="modal fade" id="modal-<?php echo e($payment->id); ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <button type="button" class="close"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="all_type_delete">
                                                            <input type="hidden" name="_token"
                                                                value="<?php echo e(csrf_token()); ?>" />
                                                            <div class="message-txt text-center">
                                                                <h4 class="text-uppercase font-weight-bold">Do You Want
                                                                    to Delete?</h4>
                                                                <h5><?php echo e($payment->id); ?></h5>
                                                                <input type="hidden" name="del_from"
                                                                    value="del_list_payment">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo e($payment->id); ?>">
                                                                <div class="yes-nobtn mt-4">
                                                                    <button class="btn btn-sm" type="submit"
                                                                        style="background-color: #C68F60; color: #ffffff">Yes</button>
                                                                    <a data-dismiss="modal" class="btn btn-sm ml-2"
                                                                        style="background-color: #121212; color: #ffffff">No</a>
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


<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
