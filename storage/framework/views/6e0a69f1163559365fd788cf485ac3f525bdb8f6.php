<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"> 
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link href="<?php echo e(asset('assets/css/mdb.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/styles/bootstrap4/bootstrap.min.css')); ?>">
<link href="<?php echo e(asset('assets/User/plugins/font-awesome-4.7.0/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.carousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/plugins/OwlCarousel2-2.2.1/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/styles/product.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/styles/product_responsive.css')); ?>">
</head>
<body>

<div class="super_container">

	
	
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(/assets/User/images/categories.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title"><?php echo e($products->product_name); ?><span>.</span></div>
								<div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product Details -->

	<div class="product_details">
		<div class="container">
			<div class="row details_row">

				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
						<?php $__currentLoopData = $products->product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jpg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($loop->iteration == 1): ?>
								<div class="details_image_large"><img src="/uploads/product_images/<?php echo e($jpg->image_name); ?>" alt="">
									<?php
										$home = new Home;
                            			$disc = $home->tampildiskon($products->discount);
									?>
									<?php if($disc!=0): ?>
										<div style="background-color:red;" class="product_extra product_new"><a href="categories.html">-<?php echo e($disc); ?>%</a></div>
									<?php endif; ?>
								</div>
								<div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
							<?php else: ?>
								<div class="details_image_thumbnail active" data-image="/uploads/product_images/<?php echo e($jpg->image_name); ?>"><img src="/uploads/product_images/<?php echo e($jpg->image_name); ?>" alt=""></div>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						<div class="details_name"><?php echo e($products->product_name); ?></div>
						<?php
							$home = new Home;
							$harga = $home->diskon($products->discount,$products->price);
						?>
						<?php if($harga != 0): ?>
							<div class="details_discount">Rp.<?php echo e(number_format($products->price)); ?></div>
							<div class="details_price">Rp.<?php echo e(number_format($harga)); ?></div>
						<?php else: ?>
							<div class="details_price">Rp.<?php echo e(number_format($products->price)); ?></div>
						<?php endif; ?>
						<!-- In Stock -->
						<div class="in_stock_container">
							<div class="availability">Availability:</div>
							<?php if($products->stock <= 0): ?>
								<span style="color:red;">Out of Stock!</span>
							  <?php else: ?>
							  	<?php if($products->stock <= 5): ?> 
									<span style="color:red;">Hurry Up!</span>
									<p style="color:black;">Only <?php echo e($products->stock); ?> left!</p>
								<?php else: ?>
									<span>In Stock</span>
									<p style="color:black;"><?php echo e($products->stock); ?> left</p>
								<?php endif; ?>
              				<?php endif; ?>
						</div>
						<div class="details_text">
							<p><?php echo e($products->description); ?></p>
						</div>

						<!-- Product Quantity -->
						<div class="product_quantity_container">
							<?php if(is_null(Auth::user())): ?>
								<?php if($products->stock<1): ?>
									<button class="btn btn-primary btn-success tombol1" disabled><i class="fa fa-cart-plus mr-2" aria-hidden="true"></i> Purchase</button>
									<button class="btn btn-primary btn-rounded tombol1" disabled><i class="fa fa-cart-plus mr-2" aria-hidden="true"></i> Add to cart</button>
								<?php else: ?>
									<button class="btn btn-primary btn-success tombol1"><i class="fa fa-cart-plus mr-2" aria-hidden="true"></i> Purchase</button>
									<button class="btn btn-primary btn-rounded tombol1"><i class="fa fa-cart-plus mr-2" aria-hidden="true"></i> Add to cart</button>
								<?php endif; ?>
							<?php else: ?>
								<?php if($products->stock<1): ?>
									<button class="btn btn-primary btn-success" class="tombol1" disabled>
										<i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i> Purchase
									</button>
									<button class="btn btn-primary btn-rounded" id="ajaxSubmit" disabled>
										<i class="fa fa-cart-plus mr-2" aria-hidden="true"></i> Add to cart
									</button>
								<?php else: ?>
								<table>
								<td>
								<form action="/checkout" method="POST">
									<?php echo csrf_field(); ?>
									<input type="hidden" name="product_id" value="<?php echo e($products->id); ?>" id="product_id">
									<?php if($harga != 0): ?>
										<input type="hidden" name="subtotal" id="subtotal" value="<?php echo e($harga); ?>">
									<?php else: ?>
										<input type="hidden" name="subtotal" id="subtotal" value="<?php echo e($products->price); ?>">
									<?php endif; ?>
									<input type="hidden" name="weight" value="<?php echo e($products->weight); ?>">
									<input type="hidden" name="qty" class="qty" value="1" readonly>
								   <button type="submit" class="btn btn-success" class="tombol1">
									<i class="fa fa-cart-plus mr-2" aria-hidden="true"></i> Purchase</button>
								</form>
								</td>
								<td>
										<input type="hidden" value="<?php echo e($products->id); ?>" id="product_id">
										<input type="hidden" value="<?php echo e(Auth::user()->id); ?>" id="user_id">
									<button class="btn btn-primary btn-rounded" id="ajaxSubmit">
										<i class="fa fa-cart-plus mr-2" aria-hidden="true"></i> Add to cart
									</button>
								</td>
								</table>
								<?php endif; ?>
							<?php endif; ?>
						</div>

						<!-- Share -->
						<div class="details_share">
							<span>Share:</span>
							<ul>
								
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- Product Reviews -->
			<section id="reviews" class="pb-5 mt-4">

				<hr>
		  
				<h4 class="h4-responsive dark-grey-text font-weight-bold my-5 text-center">
		  
				  <strong>Product Reviews</strong>
		  
				</h4>
		  
				<hr class="mb-5">
		  
				<!-- Main wrapper -->
				<div class="comments-list text-center text-md-left">
				  <?php if(!$products->product_review->count()): ?>
					<div class="d-flex justify-content-center">    
					  <div class="row mb-5">
						   <p><strong>Belum ada review produk.</strong></p> 
					  </div>
					</div>
				  <?php else: ?>
					<?php $__currentLoopData = $products->product_review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <!-- First row -->
					  <div class="row mb-5">
						
						<!-- Image column -->
						<div class="col-sm-2 col-12 mb-3">
		  
						  <img src="<?php echo e(asset('/uploads/avatars/'.$item->user->profile_image)); ?>" alt="sample image" class="avatar rounded-circle z-depth-1-half">
		  
						</div>
						<!-- Image column -->
		  
						<!-- Content column -->
						<div class="col-sm-10 col-12">
		  
						  <a>
							
							<h5 style="color:#333333" class="user-name font-weight-bold"><?php echo e($item->user->name); ?> 
							</h5>
		  
						  </a>
		  
						  <!-- Rating -->
						  <ul class="rating">
							<?php for($i = 0; $i < $item->rate; $i++): ?>
							  <li>
								<i class="fas fa-star blue-text"></i>
							  </li>
							<?php endfor; ?>
						  </ul>
						  <input type="hidden" class="rate<?php echo e($loop->iteration-1); ?>" value="<?php echo e($item->rate); ?>">
						  <input type="hidden" class="content<?php echo e($loop->iteration-1); ?>" value="<?php echo e($item->content); ?>">
						  <input type="hidden" class="review_id<?php echo e($loop->iteration-1); ?>" value="<?php echo e($item->id); ?>">
						  <div class="card-data">
							<ul class="list-unstyled mb-1">
							  <li class="comment-date font-small grey-text">
								<i class="far fa-clock-o"></i> <?php echo e($item->created_at); ?></li>
							</ul>
						  </div>
		  
						  <p class="dark-grey-text article"><?php echo e($item->content); ?></p>
		  
						</div>
						<!-- Content column -->
		  
					  </div>
					  <!-- First row -->
						  <?php if($item->response->count()): ?>
							<!-- Balasan -->
							<?php $__currentLoopData = $item->response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balasan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="row mb-5" style="margin-left: 5%">
							  
							  <!-- Image column -->
							  <div class="col-sm-2 col-12 mb-3">
		  
								<img src="<?php echo e(asset('/uploads/avatars/'.$balasan->admin->profile_image)); ?>" alt="sample image" class="avatar rounded-circle z-depth-1-half">
		  
							  </div>
							  <!-- Image column -->
		  
							  <!-- Content column -->
							  <div class="col-sm-10 col-12">
		  
								<a>
		  
								  <h5 style="color: #333333" class="user-name font-weight-bold"><span style="margin-right:5px;" class="badge success-color">Admin</span><?php echo e($balasan->admin->name); ?></h5>
		  
								</a>
								<!-- Rating -->
								<div class="card-data">
								  <ul class="list-unstyled mb-1">
									<li class="comment-date font-small grey-text">
									  <i class="far fa-clock-o"></i> <?php echo e($balasan->created_at); ?></li>
								  </ul>
								</div>
		  
								<p class="dark-grey-text article"><?php echo e($balasan->content); ?></p>
		  
							  </div>
							  <!-- Content column -->
		  
							</div>
		  
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<!-- Balasan -->
		  
						  <?php endif; ?>
		  
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  
				  <?php endif; ?>
		  
				</div>
				<!-- Main wrapper -->
		  
			  </section>
			  <!-- Product Reviews -->

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title">Related Products</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">

						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="/assets/User/images/product_1.jpg" alt=""></div>
							<div class="product_extra product_new"><a href="categories.html">New</a></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$670</div>
							</div>
						</div>

						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="/assets/User/images/product_2.jpg" alt=""></div>
							<div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$520</div>
							</div>
						</div>

						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="/assets/User/images/product_3.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$710</div>
							</div>
						</div>

						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="/assets/User/images/product_4.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$330</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<script src="<?php echo e(asset('assets/User/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/styles/bootstrap4/popper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/styles/bootstrap4/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/plugins/greensock/TweenMax.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/plugins/greensock/TimelineMax.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/plugins/scrollmagic/ScrollMagic.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/plugins/greensock/animation.gsap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/plugins/greensock/ScrollToPlugin.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.carousel.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/plugins/Isotope/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/plugins/easing/easing.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/plugins/parallax-js-master/parallax.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/User/js/product.js')); ?>"></script>
<script>
    jQuery(document).ready(function(e){
        jQuery('#ajaxSubmit').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "<?php echo e(url('/tambah_cart')); ?>",
                method: 'post',
                data: {
                    product_id: jQuery('#product_id').val(),
                    user_id: jQuery('#user_id').val(),
                },
                success: function(result){
                    jQuery('#jumlahcart').text(result.jumlah);
                }
            });
        });

        jQuery('.tombol1').click(function(e){
                e.preventDefault();
                alert('Login terlebih dahulu');
                window.location = "<?php echo e(url('/login')); ?>"
        });
    });
</script>
</body>
</html>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\barud\Downloads\Compressed\Prognet Kelompok 23\resources\views/user/product.blade.php ENDPATH**/ ?>