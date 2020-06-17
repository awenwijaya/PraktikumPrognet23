<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row align-items-centre">
		<div class="col-lg-2">
		</div>
		<div class="col-md-8">
			<div class="component">
				<div class="card">
					<form class="form-signin" action="/addImage/<?php echo e($products->id); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
					<div class="card-header">
						<center>
							<h2>Tambah Foto Produk</h2>
							<br>
						</center>
					</div>
				<div class="card-body">
					<div class="form-group">
						<label>Pilih Foto</label>
						<input type="file" class="form-control" placeholder="Nama Produk" aria-label="Nama Produk" aria-describedby="basic-addon1" name="files[]" multiple>
					</div>
					
					</div>
						<div class="card-footer" align="center">
							<button class="btn btn-success fa fa-plus" type="submit"> Add</button>
						</div>
						<br><br><br><br><br><br>
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
<br><br><br><br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\Prognet Kelompok 23\resources\views/product/adminproductimage.blade.php ENDPATH**/ ?>