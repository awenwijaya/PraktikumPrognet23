<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart | Estore.</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset ('assets/User/styles/bootstrap4/bootstrap.min.css')); ?>">
<link href="<?php echo e(asset ('assets/User/plugins/font-awesome-4.7.0/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset ('assets/User/styles/cart.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset ('assets/User/styles/cart_responsive.css')); ?>">
</head>
<body>

<div class="super_container">

    
<?php
	$total = 0;
?>    
<!-- Home -->
<div class="home">
    <div class="home_container">
        <div class="home_background" style="background-image:url(assets/User/images/cart.jpg)"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="breadcrumbs">
                                <ul>
                                	<div class="home_title" style="font-size: 30px; color:#e95a5a;"><?php echo e(Auth::user()->name); ?>'s Cart</div>
                                    <li><a href="/" style="font-size: 25px">Home</a></li>
                                    <li><a style="font-size: 25px">Cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<!-- Cart Info -->
	<div class="cart_info ganti">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Product</div>
						<div class="cart_info_col cart_info_col_price">Price</div>
						<div class="cart_info_col cart_info_col_quantity">Quantity</div>
						<div class="cart_info_col cart_info_col_total">Sub-Total</div>
					</div>
				</div>
			</div>
			<?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			<div class="row cart_items_row">
				<div class="col">
					<!-- Cart Item -->
					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<input type="hidden" class="id_cart<?php echo e($loop->iteration-1); ?>" value="<?php echo e($isi->id); ?>">
                  			<input type="hidden" id="user_id" value="<?php echo e($isi->user_id); ?>">
                  			<input type="hidden" class="stock<?php echo e($loop->iteration-1); ?>" value="<?php echo e($isi->product->stock); ?>">
							<?php $__currentLoopData = $isi->product->product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="cart_item_image">
								<div><img src="/uploads/product_images/<?php echo e($image->image_name); ?>" alt=""></div>
							</div>
							<?php break; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href="/product/<?php echo e($image->product_id); ?>"><?php echo e($isi->product->product_name); ?></a></div>
								<p style="color:black;"><?php echo e($isi->product->stock); ?> left</p>
							</div>
						</div>
						<!-- Price -->
						<?php
                    		$home = new Home;
                    		$harga = $home->diskon($isi->product->discount,$isi->product->price);
						?>
						<?php if($harga != 0): ?>
						<div class="cart_item_price">
							Rp.<span class="float-lef grey-text price<?php echo e($loop->iteration-1); ?>"><?php echo e($harga); ?></li>
							Rp.<span class="float-lef grey-text"><small><s><?php echo e($isi->product->price); ?></s></small></span>
						</div>
						<?php else: ?>
							<div class="cart_item_price">
								Rp.<span class="float-lef grey-text price<?php echo e($loop->iteration-1); ?>"><?php echo e($isi->product->price); ?></li>
							</div>
						<?php endif; ?>
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<p class="text-danger" style="display:none" id="notif<?php echo e($loop->iteration-1); ?>"></p>
							<span class="qty<?php echo e($loop->iteration-1); ?>"><?php echo e($isi->qty); ?> </span>
							<div class="btn-group radio-group ml-2" data-toggle="buttons">
								<button type="button" class="fa fa-minus btn btn-sm btn-secondary tombol-kurang" data-toggle="tooltip" data-placement="top" title="Kurangi item">
			
								<button type="button" class="fa fa-plus btn btn-sm btn-primary tombol-tambah" data-toggle="tooltip" data-placement="top" title="Tambah item">

								<button type="button" class="fa fa-trash btn btn-sm btn-danger tombolhapus" data-toggle="tooltip" data-placement="top" title="Hapus item">
							</div>
						</div>
						<!-- Total -->
						<?php if($harga != 0): ?>
                        	<strong class="cart_item_total sub-total<?php echo e($loop->iteration-1); ?>"><?php echo e($harga*$isi->qty); ?></strong>
                        	<?php
                            	$total = $total + ($harga*$isi->qty);
                        	?>
                    	<?php else: ?>
                        	<strong class="cart_item_total sub-total<?php echo e($loop->iteration-1); ?>"><?php echo e($isi->product->price*$isi->qty); ?></strong>
                        	<?php
                            	$total = $total + ($isi->product->price*$isi->qty);
                        	?>
                    	<?php endif; ?>
					</div>

				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<br><br><br><p class="fa fa-shopping-cart" style="font-size:50px;margin-left:495px;" align="center"><br><br>Cart Kosong!</p>
			<?php endif; ?>

			
			<div class="row row_cart_buttons">
				<div class="col">
					<br><br>
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="/home">Continue shopping</a></div>
					</div>
				</div>
			</div><br>
				<?php if($total != 0): ?>
				<div class="row row_extra">
					<div class="col-lg-4"></div>
					<div class="col-lg-6 offset-lg-2">
						<div class="cart_total">
							<div class="section_title">Cart total</div>
							<div class="section_subtitle">Final info</div>
							<div class="cart_total_container">
								<ul>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Total</div>
										<div class="cart_total_value ml-auto total"><?php echo e($total); ?></div>
									</li>
								</ul>
							</div>
							<input id="signup-token" name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
							<br>
		                <div align="center">
		                  <form action="/checkout" method="POST">
		                		<?php echo csrf_field(); ?>
		                    	<input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
		                    	<input type="hidden" name="sub_total" value="<?php echo e($total); ?>">
	                    	
		                    	
								
	                			<button type="submit" class="btn btn-dark">Complete purchase
								<i class="fa fa-angle-right right"></i></button>
		                  </form>
		                </div>

						</div>
					</div>
				</div>
				<?php else: ?>
				<div></div>
				<?php endif; ?>
		</div>		
	</div>
</div>

<script src="<?php echo e(asset ('assets/User/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/User/styles/bootstrap4/popper.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/User/styles/bootstrap4/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/User/plugins/greensock/TweenMax.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/User/plugins/greensock/TimelineMax.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/User/plugins/scrollmagic/ScrollMagic.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/User/plugins/greensock/animation.gsap.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/User/plugins/greensock/ScrollToPlugin.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/User/plugins/easing/easing.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/User/plugins/parallax-js-master/parallax.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/User/js/cart.js')); ?>"></script>
<script>
	jQuery(document).ready(function(e){
		jQuery('.tombol-tambah').click(function(e){
		  var index = $(".tombol-tambah").index(this);
		  var jumlah = $(".qty"+index).text();
		  var jumlah = parseInt(jumlah)+1
		  $(".qty"+index).text(jumlah);
		  var price = $('.price'+index).text();
		  console.log('price: '+price);
  
		  if(parseInt(jumlah) > parseInt($(".stock"+index).val())){
			  $("#notif"+index).css('display','inline');
			  $("#notif"+index).text('Jumlah pembelian melebihi stock produk');
			  $("#notif"+index).append('<br>');
			  $(".qty"+index).text(jumlah-1);
		  }else{
			var subtotal = parseInt(jumlah)*parseInt(price);
			console.log('subtotal: ', + subtotal)
			$(".sub-total"+index).text(subtotal);
			var total = parseInt($(".total").text());
			total = total + parseInt(price);
			$(".total").text(total);
			$("#notif"+index).css('display','none');
  
			jQuery.ajax({
				url: "<?php echo e(url('/update_qty')); ?>",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					id: $('.id_cart'+index).val(),
					qty: 1
				},
				success: function(result){
					console.log(result.success);
				}
			});
		  }
		});
  
		jQuery('.tombol-kurang').click(function(e){
		  var index = $(".tombol-kurang").index(this);
		  var jumlah = $(".qty"+index).text();
		  var jumlah = parseInt(jumlah)-1
		  $(".qty"+index).text(jumlah);
		  var price = $('.price'+index).text();
		  console.log('price: '+price);
  
		  if(parseInt(jumlah) == 0){
			  $("#notif"+index).css('display','inline');
			  $("#notif"+index).text('Stock tidak boleh kosong');
			  $("#notif"+index).append('<br>');
			  $(".qty"+index).text(1);
		  }else{
			var subtotal = parseInt(jumlah)*parseInt(price);
			console.log('subtotal: ', + subtotal)
			$(".sub-total"+index).text(subtotal);   
			var total = parseInt($(".total").text());
			total = total - parseInt(price);
			$(".total").text(total);
			$("#notif"+index).css('display','none');
			jQuery.ajax({
				url: "<?php echo e(url('/update_qty')); ?>",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					id: $('.id_cart'+index).val(),
					qty: -1
				},
				success: function(result){
					console.log(result.success);
				}
			});
		  }
		});
  
		jQuery('.tombolhapus').click(function(e){
		  var index = $(".tombolhapus").index(this);
		 var konfirmasi = confirm('Apakah anda yakin ingin menghapus produk dari keranjang?');
		  if(konfirmasi == true){
			jQuery.ajax({
				url: "<?php echo e(url('/update_qty')); ?>",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					id: $('.id_cart'+index).val(),
					user_id: $('#user_id').val(),
					qty: 0
				},
				success: function(result){
					location.reload();
					// console.log(result.success);
				}
			});
		  }
		});
	});
  </script>
</body>
</html>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\semester 4\pratikum prognet\Prognet Kelompok 23\Prognet Kelompok 23\resources\views/user/cart.blade.php ENDPATH**/ ?>