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
		<h2 class="card-title" align="center">List Produk</h2 >
		<br>
		<span>
		<button type="button" class="btn-sm btn-success btn-icon-text" onclick="">
			<i class="mdi mdi-upload btn-icon-prepend fa fa-plus"></i>     
			<a href="<?php echo e(route('products.create')); ?>" style="color: white;">Tambah Produk</a>
		</button>
		<button type="button" class="btn-sm btn-danger btn-icon-text" onclick="">
			<i class="mdi  mdi-delete btn-icon-prepend fa fa-trash"></i>
			<a href="/products-trash" style="color: white">Trash</a>
		</button>
		</span>
		  <table class="table table-striped table-hover" style="width:1100px;">
			<thead>
			  <tr>
				<th >
					No.
			 	</th>
				<th >
			   		Nama Produk
				</th>
				<th >
				  Kategori
				</th>
				<th style="text-align: center;">
					Diskon
				</th>
				<th colspan="3" style="text-align: center;">
				  Action
				</th>
			  </tr>
			</thead>
			<tbody>
			  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <tr>
				<td><?php echo e($loop->iteration); ?></td>
				<td><?php echo e($product->product_name); ?></td>
				<td>
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($product->id == $category->product_id): ?>
					  <li><?php echo e($category->category_name); ?></li>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</td>
				<td align="center"><a 
					<?php $__currentLoopData = $discount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($product->id == $discounts->id_product): ?>
							class="btn btn-primary fa fa-percent"
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						class="btn btn-danger fa fa-percent"
					href="<?php echo e(route('discounts.show',$product->id)); ?>"></a></td>
				<td align="center">
					<a class="btn-sm btn-info fa fa-eye" href="<?php echo e(route('products.show',$product->id)); ?>"></a>
				
					<a class="btn-sm btn-warning fa fa-pencil" href="<?php echo e(route('products.edit',$product->id)); ?>"></a>
				
					<a class="btn-sm btn-danger fa fa-trash" href="/products/delete/<?php echo e($product->id); ?>" onclick="return confirm('Apa yakin ingin menghapus data ini?')"></a>
				</td>
			  </tr>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		  </table>
		  <?php echo $products->links(); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\barud\Downloads\Compressed\Prognet Kelompok 23\resources\views/product/adminlist.blade.php ENDPATH**/ ?>