<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Estore.</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link href="<?php echo e(asset('assets/css/mdb.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/styles/bootstrap4/bootstrap.min.css')); ?>">
<link href="<?php echo e(asset('assets/User/plugins/font-awesome-4.7.0/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.carousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/plugins/OwlCarousel2-2.2.1/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/styles/main_styles.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/styles/responsive.css')); ?>">	
</head>
<body>
<div class="super_container">

	<!-- Header -->

	
	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(assets/User/images/home_slider_2.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title" style="color:black; background-color: rgba(255, 255, 255, 0.5)">Estore.</div>
										<div class="home_slider_subtitle" style="color:black; background-color: rgba(255, 255, 255, 0.5)">Rasakan sensasi berbelanja menyenangkan hanya di Estore.</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(assets/User/images/home_slider_3.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Buat Doi Klepek Klepek</div>
										<div class="home_slider_subtitle">Kamu siapa ya?</div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(assets/User/images/home_slider_1.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content "  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title" style="color:black; background-color: rgba(255, 255, 255, 0.5)">#RIBETLESS</div>
										<div class="home_slider_subtitle" style="color:black; background-color: rgba(255, 255, 255, 0.5)">Dapatkan Segera Produk Pakaian Terbaik Hanya di Estore.</div>
										<div class="button button_light home_button" style="color:black; background-color: rgba(255, 255, 255, 0.5)"><a href="#">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Dots -->
			
			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">01.</li>
									<li class="home_slider_custom_dot">02.</li>
									<li class="home_slider_custom_dot">03.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>
	</div>

	<!-- Ads -->

	<div class="avds">
		<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
			<div class="avds_small">
				<div class="avds_background" style="background-image:url(assets/User/images/avds_small.jpg)"></div>
				<div class="avds_small_inner">
					<div class="avds_discount_container">
						<img src="<?php echo e(asset('assets/User/images/discount.png')); ?>" alt="">
						<div>
							<div class="avds_discount">
								<div>20<span>%</span></div>
								<div>Discount</div>
							</div>
						</div>
					</div>
					<div class="avds_small_content">
						<div class="avds_title" style="background-color: rgba(0, 0, 0, 0.5)">Jas Jeans</div>
						<div class="avds_text" style="background-color: rgba(0, 0, 0, 0.5)">Jangan sampai lewatkan #tampillebihelegant</div>
						<div class="avds_link"><a href="/product/2">See More</a></div>
					</div>
				</div>
			</div>
			<div class="avds_large">
				<div class="avds_background" style="background-image:url(assets/User/images/avds_large.jpg)"></div>
				<div class="avds_large_container">
					<div class="avds_large_content">
						<div class="avds_title">Indonesia Top Designer</div>
						<div class="avds_text">Anak Bangsa Yang Karyanya Mendunia</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  
	<!-- Products -->
	<br><br>
	<hr class="mb-5">
	<div class="container">
		<div class="row">
			<div class="col-sm d-flex">
				<div class="form-group">
					<p style="font-size: 50px"><i>CATEGORIES</i></p>
				</div>
			</div>
		</div>
	</div>
	<hr class="mb-5">
	<div class="container">
		<div class="row">
			<div class="col-sm d-flex">
				<div class="form-group">
					<input class="form-check-input radiobtn" name="group100" type="radio" id="radio100" selected checked value="0">
					<label for="radio100" class="form-check-label dark-grey-text">All</label>
				</div>
			</div>
			  <input id="signup-token" name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
		  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <?php if($item->product->count()): ?>
				  <div class="col-sm d-flex">
					<div class="form-group">
						  <input class="form-check-input radiobtn" name="group100" type="radio" id="radio10<?php echo e($loop->iteration); ?>" value="<?php echo e($item->id); ?>">
						  <label for="radio10<?php echo e($loop->iteration); ?>" class="form-check-label dark-grey-text"><?php echo e($item->category_name); ?></label>
					  </div>
				  </div>
				  <br>
			  <?php else: ?>
				  <input type="hidden" id="radio10<?php echo e($loop->iteration); ?>" class="radiobtn">
			  <?php endif; ?>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
	<hr class="mb-5">
	<div class="container">
		<div class="row">
			<div class="col-sm d-flex">
				<div class="form-group">
					<p style="font-size: 50px"><i>PRODUCTS</i></p>
				</div>
			</div>
		</div>
	</div>
	<hr class="mb-5">
	<div class="ganti">
	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="product_grid">
						<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
											<div style="text-decoration:line-through;" class="product_price">Rp. <?php echo e(number_format($products->price)); ?></div>
											<div style="font-weight:bold;color:black;" class="product_price">Rp. <?php echo e(number_format($harga)); ?></div>
										<?php else: ?>
											<div class="product_price">Rp. <?php echo e(number_format($products->price)); ?></div>
										<?php endif; ?>
								</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<hr class="mb-5">

	<!-- Ad -->
	<div class="avds_xl">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="avds_xl_container clearfix">
						<div class="avds_xl_background" style="background-image:url(assets/User/images/avds_xl.jpg)"></div>
						<div class="avds_xl_content">
							<div class="avds_title">Cegah Penyebaran COVID-19</div>
							<div class="avds_text">#BELANJADARIRUMAH</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="assets/User/images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Shipping to All Around Indonesia</div>
						<div class="icon_box_text">
							<p>Medukung ekspedisi yang menjangkau keseluruh Indonesia</p>	
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="assets/User/images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Free Returns</div>
						<div class="icon_box_text">
							<p>Produk tidak sesuai? tidak original? KEMBALIKAN! GRATIS!</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="assets/User/images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">24h Fast Support</div>
						<div class="icon_box_text">
							<p>Cek SosMed kami melalui link yang tersedia</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<footer>
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
<script src="<?php echo e(asset('assets/User/js/custom.js')); ?>"></script>
</footer>
<script>
    jQuery(document).ready(function(e){
        jQuery('.radiobtn').click(function(e){
            var index = $('.radiobtn').index(this);
            console.log(jQuery('#radio10'+index).val());
            jQuery.ajax({
                url: "<?php echo e(url('/show_categori')); ?>",
                method: 'post',
                data: {
                    _token: $('#signup-token').val(),
                    id: jQuery('#radio10'+index).val(),
                },
                success: function(result){
                    $('.ganti').html(result.hasil);
                }
            });
        });

        jQuery('#search').keyup(function(e){
          var isi = $('#search').val();
          jQuery.ajax({
                url: "<?php echo e(url('/show_categori')); ?>",
                method: 'post',
                data: {
                    _token: $('#signup-token').val(),
                    id: -1,
                    cari: isi 
                },
                success: function(result){
                    $('.ganti').html(result.hasil);
                }
            });
        });
    });
	
</script>

</body>
</html>

<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\semester 4\pratikum prognet\Prognet Kelompok 23\Prognet Kelompok 23\resources\views/home.blade.php ENDPATH**/ ?>