<?php $__env->startSection('content'); ?>
<?php if($message = Session::get('success')): ?>
      		<div class="alert alert-success alert-block">
        		<button type="button" class="close" data-dismiss="alert">×</button> 
          		<strong><?php echo e($message); ?></strong>
      		</div>
		<?php endif; ?>
		<?php if($message = Session::get('error')): ?>
      		<div class="alert alert-danger alert-block">
        		<button type="button" class="close" data-dismiss="alert">×</button> 
        		<strong><?php echo e($message); ?></strong>
      		</div>
    	<?php endif; ?>
      <div class="table">
        <h2 class="card-title" align="center">List Kurir</h2>
        <br>
            <button type="button" class="btn-sm btn-success btn-icon-text" onclick="">
                    <i class="mdi mdi-upload btn-icon-prepend fa fa-plus"></i>     
                    <a href="<?php echo e(route('couriers.create')); ?>" style="color: white;">Tambah Kurir</a>
            </button>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
					        <th>
						          No.
					        </th>
                    <th>
                      Nama Kurir
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $couriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
					<td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($courier->courier); ?></td>
                    <td>
                        <a class="btn-sm btn-warning fa fa-pencil" href="<?php echo e(route('couriers.edit',$courier->id)); ?>"></a>

              <form action="<?php echo e(route('couriers.destroy', $courier->id)); ?>" method="post">
							<?php echo e(csrf_field()); ?>

							<?php echo method_field('DELETE'); ?>
							<button class="btn btn-danger fa fa-trash" type="submit" onclick="return confirm('Apa yakin ingin menghapus data ini?')"></button>
						  </form>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <?php echo $couriers->links(); ?>

            </div>
          </div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.kurir', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\semester 4\pratikum prognet\Prognet Kelompok 23\Prognet Kelompok 23\resources\views/courier/courierlist.blade.php ENDPATH**/ ?>