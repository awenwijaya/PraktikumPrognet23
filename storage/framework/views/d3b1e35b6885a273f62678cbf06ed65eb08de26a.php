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
		<h2 class="card-title" align="center">List Trash Produk</h2>
		<br>
        <span>
        <button type="button" class="btn-sm btn-warning btn-icon-text" onclick="">
            <i class="mdi mdi-keyboard-backspace btn-icon-prepend fa fa-arrow-left"></i>     
            <a href="/products" style="color: white;">Back</a>
        </button>
        <button type="button" class="btn-sm btn-success btn-icon-text" onclick="">
            <i class="mdi mdi-file-restore btn-icon-prepend fa fa-undo"></i>     
            <a href="/products-restore-all" style="color: white;"  onclick="return confirm('Apa yakin ingin mengembalikan semua data ini?')">Restore All</a>
        </button>
        <button type="button" class="btn-sm btn-danger btn-icon-text" onclick="">
            <i class="mdi mdi-delete-forever btn-icon-prepend fa fa-trash"></i>
            <a href="/products-delete-all" style="color: white"  onclick="return confirm('Apa yakin ingin menghapus permanen semua data ini?')">Delete All</a>
        </button>
        </span>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
               Nama Produk
				</th>
				<th>
				Kategori
				</th>
                <th>
                  Rating
                </th>
                <th>
                  Stock
                </th>
                <th>
                  Berat
                </th>
                <th>
                  Harga
                </th>
                <th>
                  Deskripsi Produk
                </th>
                <th colspan="2" style="text-align:center;">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
				<td><?php echo e($product->product_name); ?></td>
				<td>
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($product->id == $category->product_id): ?>
					  <li><?php echo e($category->category_name); ?></li>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</td>
                <td><?php echo e($product->product_rate); ?></td>
                <td><?php echo e($product->stock); ?></td>
                <td><?php echo e($product->weight); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->description); ?></td>
                <td>
                    <a class="btn-sm btn-info fa fa-undo" href="/products/restore/<?php echo e($product->id); ?>"  onclick="return confirm('Apa yakin ingin mengembalikan data ini?')"></a>
				</td>
				<td>
					<a class="btn-sm btn-danger fa fa-trash" href="/products/destroy/<?php echo e($product->id); ?>"  onclick="return confirm('Apa yakin ingin menghapus permanen data ini?')"></a>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <?php echo $products->links(); ?>

		</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\semester 4\pratikum prognet\Prognet Kelompok 23\Prognet Kelompok 23\resources\views/product/admintrash.blade.php ENDPATH**/ ?>