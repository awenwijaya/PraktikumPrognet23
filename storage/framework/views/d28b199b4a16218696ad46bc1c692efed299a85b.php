<?php $__env->startSection('content'); ?>
<?php if($message = Session::get('success')): ?>
      		<div class="alert alert-success alert-block">
        		<button type="button" class="close" data-dismiss="alert">×</button> 
          		<strong><?php echo e($message); ?></strong>
      		</div>
<?php endif; ?>
<div style="margin-top:50px ">
    <div class="container">
        <div class="row align-items-centre">
            <div class="col-lg-2">
            </div>
            <div class="col-md-8">
                <div class="component">
                    <div class="card">
                        <form class="form-signin" action="<?php echo e(route('couriers.update', $courier->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>

                            <div class="card-header">
                                <center>
                                    <h2>Edit Kurir</h2>
                                    <br>
                                </center>
                            </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kurir</label>
                            <input type="text" class="form-control" placeholder="Nama Kurir" value="<?php echo e($courier->courier); ?>" aria-label="Nama Kurir" aria-describedby="basic-addon1" name="courier">
                        </div>
                    </div>
                    <div class="card-footer" align="center">
                        <button class="btn btn-success fa fa-pencil" type="submit" onclick="return confirm('Apa yakin ingin mengubah data ini?')"> Edit</button>
                    </div>
                        </form>
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br><br><br><br><br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.kurir', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\semester 4\pratikum prognet\Prognet Kelompok 23\Prognet Kelompok 23\resources\views/courier/courieredit.blade.php ENDPATH**/ ?>