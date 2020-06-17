<?php $__env->startSection('content'); ?>
<?php if($message = Session::get('success')): ?>
      		<div class="alert alert-success alert-block">
        		<button type="button" class="close" data-dismiss="alert">×</button> 
          		<strong><?php echo e($message); ?></strong>
      		</div>
<?php endif; ?>
    <div class="container">
        <div class="row align-items-centre">
            <div class="col-lg-2">
            </div>
            <div class="col-md-8">
                <div class="component">
                    <div class="card">
                        <form class="form-signin" action="<?php echo e(route('products.update', $products->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>

                        <div class="card-header">
                            <center>
								<h2>Edit Produk</h2>
								<br>
                            </center>
                        </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" placeholder="Nama Produk" value="<?php echo e($products->product_name); ?>" aria-label="Nama Produk" aria-describedby="basic-addon1" name="product_name">
                        </div>
                        <div class="form-group">
                            <label>Harga Satuan</label>
                            <input type="text" class="form-control" placeholder="Harga Satuan" value="<?php echo e($products->price); ?>" aria-label="Harga Satuan" aria-describedby="basic-addon1" name="price">
						</div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="text" class="form-control" placeholder="Stock" aria-label="Stock" value="<?php echo e($products->stock); ?>" aria-describedby="basic-addon1" name="stock">
                        </div>
                        <div class="form-group">
                            <label>Berat Produk</label>
                            <input type="text" class="form-control" placeholder="Berat Produk" aria-label="Berat Produk" value="<?php echo e($products->weight); ?>"  aria-describedby="basic-addon1" name="weight">
						</div>
						<div class="form-group">
							<label class="control-label">Kategori</label>
							<select name="category_id[]" class="selectpicker form-control" multiple data-live-search="true"  multiple="multiple" required>
								<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option
									<?php $__currentLoopData = $categoryDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($dataDetail->category_id == $categories->id): ?>
											selected="selected"
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									value="<?php echo e($categories->id); ?>"><?php echo e($categories->category_name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="form-group">
							<strong>Description</strong>
							<textarea class="form-control" col="4" name="description" placeholder="Deskripsi Produk" ><?php echo e($products->description); ?></textarea>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\Prognet Kelompok 23\resources\views/product/adminedit.blade.php ENDPATH**/ ?>