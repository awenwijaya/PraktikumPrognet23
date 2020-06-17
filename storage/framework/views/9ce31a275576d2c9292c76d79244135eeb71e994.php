<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row align-items-centre">
		<div class="col-lg-2">
		</div>
		<div class="col-md-8">
			<div class="component">
				<div class="card">
					<form class="form-signin" action="<?php echo e(route('couriers.store')); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						<div class="card-header">
							<center>
								<h2>Tambah Kurir</h2>
								<br>
							</center>
						</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama Kurir</label>
						<input type="text" class="form-control" placeholder="Nama Kurir" aria-label="Nama Produk" aria-describedby="basic-addon1" name="courier">
				</div>
				<div class="card-footer" align="center">
					<button class="btn btn-md btn-primary btn-icon-text" type="submit">
						<i class="mdi mdi-arrow-right btn-icon-prepend fa fa-plus"></i> Add Courier
					</button>
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
<br><br><br><br><br><br><br><br><br><br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.kurir', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\Prognet Kelompok 23\resources\views/courier/couriercreate.blade.php ENDPATH**/ ?>