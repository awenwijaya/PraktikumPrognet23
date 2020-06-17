<?php if($status == 0): ?>
<div class="products">
<div class="container">
    <div class="row">
        <div class="col">
            <div class="product_grid">
                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Product -->
                <div class="product">
                    <?php $__currentLoopData = $products->product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product_image"><img style="width:250px;height:250px;" src="/uploads/product_images/<?php echo e($image->image_name); ?>" alt=""></div>
                        <?php break; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $home = new Home;
                        $disc = $home->tampildiskon($products->discount);
                    ?>
                    <?php if($disc!=0): ?>
                        <div style="background-color:red;"class="product_extra product_new"><a href="categories.html">-<?php echo e($disc); ?>%</a></div>
                    <?php endif; ?>
                        <div class="product_content">
                        <div class="product_title"><a href="/product/<?php echo e($products->id); ?>"><?php echo e($products->product_name); ?></a></div>
                        <span class="badge badge-primary mb-2">Rating: <?php echo e($products->product_rate); ?> <i class="fa fa-star"></i></span>
						<?php if($products->stock == 0): ?>
							<span class="badge badge-danger mb-2">Out Of Stock!</span>
						<?php endif; ?>
                    <?php
                        $home = new Home;
                        $harga = $home->diskon($products->discount,$products->price);
                    ?>
                    <?php if($harga != 0): ?>	   
                        <div style="text-decoration:line-through;" class="product_price">Rp.<?php echo e(number_format($products->price)); ?></div>
                        <div style="font-weight:bold;color:black;" class="product_price">Rp.<?php echo e(number_format($harga)); ?></div>
                    <?php else: ?>
                    <div class="product_price">Rp.<?php echo e(number_format($products->price)); ?></div>
                    <?php endif; ?>
                </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
</div>
</div>
<script src="<?php echo e(asset('assets/User/js/custom.js')); ?>"></script>
<?php else: ?>
<div class="products">
<div class="container">
    <div class="row">
        <div class="col">
            <div class="product_grid">
                <?php $__currentLoopData = $kategori->product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Product -->
                <div class="product">
                    <?php $__currentLoopData = $products->product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product_image"><img style="width:250px;height:250px;" src="/uploads/product_images/<?php echo e($image->image_name); ?>" alt=""></div>
                        <?php break; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $home = new Home;
                        $disc = $home->tampildiskon($products->discount);
                    ?>
                    <?php if($disc!=0): ?>
                        <div style="background-color:red;"class="product_extra product_new"><a href="categories.html">-<?php echo e($disc); ?>%</a></div>
                    <?php endif; ?>
                        <div class="product_content">
                        <div class="product_title"><a href="/product/<?php echo e($products->id); ?>"><?php echo e($products->product_name); ?></a></div>
                        <span class="badge badge-primary mb-2">Rating: <?php echo e($products->product_rate); ?> <i class="fa fa-star"></i></span>
						<?php if($products->stock == 0): ?>
						<span class="badge badge-danger mb-2">Out Of Stock!</span>
						<?php endif; ?>
                    <?php
                        $home = new Home;
                        $harga = $home->diskon($products->discount,$products->price);
                    ?>
                    <?php if($harga != 0): ?>	   
                        <div style="text-decoration:line-through;" class="product_price">Rp.<?php echo e(number_format($products->price)); ?></div>
                        <div style="font-weight:bold;color:black;" class="product_price">Rp.<?php echo e(number_format($harga)); ?></div>
                    <?php else: ?>
                    <div class="product_price">Rp.<?php echo e(number_format($products->price)); ?></div>
                    <?php endif; ?>
                </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
</div>
</div>
<script src="<?php echo e(asset('assets/User/js/custom.js')); ?>"></script>
<?php endif; ?><?php /**PATH C:\Users\barud\Downloads\Compressed\Prognet Kelompok 23\resources\views/filter.blade.php ENDPATH**/ ?>