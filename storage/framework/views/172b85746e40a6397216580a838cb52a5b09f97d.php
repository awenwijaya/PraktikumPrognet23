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
		<h2 class="card-title" align="center">List Diskon</h2 >
		<br>
		<span>
		<button type="button" class="btn-sm btn-success btn-icon-text" onclick="">
			<i class="mdi mdi-upload btn-icon-prepend fa fa-plus"></i>     
			<a href="/addDiscount/<?php echo e($prd); ?>" style="color: white;">Tambah Diskon</a>
		</button>
		</span>
		  <table class="table table-striped table-hover" style="width:1100px;">
			<thead>
			  <tr>
				<th >
					No.
			 	</th>
				<th >
			   		Persentase Diskon
				</th>
				<th >
					Start
				</th>
				<th>
					End
				</th>
				<th colspan="2" style="text-align: center;">
				  Action
				</th>
			  </tr>
			</thead>
			<tbody>
			  <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <?php $__empty_1 = true; $__currentLoopData = $valid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			  <tr>
				<td><?php echo e($loop->iteration); ?></td>
				<td><?php echo e($val->percentage); ?>%</td>
				<td><?php echo e(date('Y-m-d', strtotime($val->start))); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($val->end))); ?></td>
				<td align="center">
					<a class="btn-sm btn-warning fa fa-pencil" href="<?php echo e(route('discounts.edit',$val->id)); ?>"></a>
				
					<form action="<?php echo e(route('discounts.destroy', $val->id)); ?>" method="post">
						<?php echo e(csrf_field()); ?>

						<?php echo method_field('DELETE'); ?>
						<button class="btn btn-danger fa fa-trash" type="submit" onclick="return confirm('Apa yakin ingin menghapus data ini?')"></button>
					</form>
				</td>
			  </tr>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			  <td colspan="5" align="center">Tidak ada Diskon!</td>
			  <?php endif; ?>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		  </table>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\Prognet Kelompok 23\resources\views/product/admindiscount.blade.php ENDPATH**/ ?>