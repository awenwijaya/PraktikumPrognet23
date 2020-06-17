<?php $__env->startSection('content'); ?>
<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          	<strong><?php echo e($message); ?></strong>
    </div>
<?php endif; ?>
        <h2 class="card-title" style="text-align: center;">Detail Produk</h2>
        <br>
		<div class="table">
		  <table class="table table-striped table-bordered " align='center' >
			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tbody>
			  <tr>
				<th>Nama Produk</th>
				<td><?php echo e($product->product_name); ?></td>
			  </tr>
			  <tr>
				<th>Rating Produk</th>
				<td><?php echo e($product->product_rate); ?></td>
			  </tr>
			  <tr>
				<th>Stock</th>
				<td><?php echo e($product->stock); ?></td>
			  </tr>
			  <tr>
				<th>Berat</th>
				<td><?php echo e($product->weight); ?></td>
			  </tr>
			  <tr>
				<th>Harga</th>
				<td>Rp. <?php echo e(number_format($product->price)); ?></td>
			  </tr>
			  <tr>
				<th>Deskripsi</th>
				<td><?php echo e($product->description); ?></td>
			  </tr>
			  <tr>
				<th>Kategori</th>
				<td>
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <button class="btn btn-light"><?php echo e($category->category_name); ?></button>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</td>
			  </tr>
			</tbody>
		  </table>
		  <span>
            <div class="wrapper" align="center">
		  <button type="button" class="btn btn-warning btn-icon-text" onclick="/createProduct">
				<i class="mdi mdi-file-restore btn-icon-prepend fa fa-pencil"></i>     
				<a href="<?php echo e(route('products.edit',$product->id)); ?>" style="color: white;">Edit Produk</a>
        </button>
            
		<button type="button" class="btn btn-success btn-icon-text" onclick="/addImage/<?php echo e($product->id); ?>">
				<i class="mdi mdi-file-restore btn-icon-prepend fa fa-picture-o"></i>     
				<a href="/addImage/<?php echo e($product->id); ?>" style="color: white;">Tambah Foto Produk</a>
        </button>
            </div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </span>
        <br>
		</div>
      <br><br>
        <h2 class="card-title" align="center">Foto Produk</h2>
        <br>
		  <div class="table">
			<div class="row">
			 <?php $__empty_1 = true; $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			  <div class="col-md-4">
				<div class="thumbnail">
				  <img class="img-fluid-left img-thumbnail" src="/uploads/product_images/<?php echo e($images->image_name); ?>" alt="light" style="width:200px; height:200px;">
				  <form method="post" action="<?php echo e(route('product_images.destroy', $images->id)); ?>">
					<?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <div class="wrapper" align="center">
				  <button type="submit" class="btn btn-danger btn-icon-text fa fa-trash" onclick="return confirm('Apa yakin ingin menghapus gambar ini?')">
                 </button>
                </div>
				 </form>
				</div>
			  </div>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			  <h1 align="center"> Tidak ada foto!</h1>
			  <?php endif; ?>
			</div>
		  </div>
		  
			<h2 align="center" class="card-title">Review Produk</h4>
				<br>
				<div class="table">
				  <table class="table table-striped table-bordered " align='center'>
					<thead>
					  <tr>
						<th>No</th>
						<th>Nama User</th>
						<th>Rate</th>
						<th>Review</th>
						<th>Response</th>
						<th>Action</th>
					  </tr>
					</thead>
					<tbody>
					  <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
						  <td><?php echo e($loop->iteration); ?></td>
						  <td><?php echo e($review->name); ?></td>
						  <td><?php echo e($review->rate); ?></td>
						  <td><?php echo e($review->content); ?></td>
						  <td><?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($review->id == $response->review_id): ?>
								  <?php echo e($response->content); ?>

								<?php endif; ?>
							  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  </td>
						  <td>
							  <button type="button" id="balas" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#response-<?php echo e($review->id); ?>">Balas</button></td>
						</tr>
						<script>
							$('#balas').click(function(e){
								e.preventDefault();
								$('#response-<?php echo e($review->id); ?>').modal();
							});
						</script>
						<!-- Modal -->
							<div class="modal" id="response-<?php echo e($review->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Response Review</h5>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo e(route('response.store')); ?>" method="POST">
									  <?php echo csrf_field(); ?>
									  <div class="form-group">
										<input type="text" name="" readonly="" value="<?php echo e($review->content); ?>" class="form-control">
									  </div>
									  <div class="form-group">
										<label>Respon</label>
										<input type="text" name="content" class="form-control" style="width: 80%; margin-right: 20px;" placeholder="Respon review">
										<input type="hidden" name="review_id" value="<?php echo e($review->id); ?>">
										<input type="hidden" name="admin_id" value="<?php echo e(Auth::user()->id); ?>">
									  </div>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
									<button type="submit" class="btn btn-primary">Kirim</button>
									</form>
								  </div>
								</div>
							  </div>
							</div>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				  </table>
				</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\semester 4\pratikum prognet\Prognet Kelompok 23\Prognet Kelompok 23\resources\views/product/adminlistdetail.blade.php ENDPATH**/ ?>