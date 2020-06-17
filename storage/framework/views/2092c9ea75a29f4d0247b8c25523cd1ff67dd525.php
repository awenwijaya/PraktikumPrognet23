<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout | Estore.</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link href="<?php echo e(asset('assets/css/mdb.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/styles/bootstrap4/bootstrap.min.css')); ?>">
<link href="<?php echo e(asset('assets/User/plugins/font-awesome-4.7.0/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/styles/checkout.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/User/styles/checkout_responsive.css')); ?>">
</head>
<body>

<div class="super_container">

	
	
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
										<li><a href="/cart" style="font-size: 25px">Cart</a></li>
										<li><a style="font-size: 25px">Checkout</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Checkout -->
	
	<div class="checkout">
		<div class="container">
      <form action="/beli" method="post" id="checkout_form" class="checkout_form">
        <?php echo csrf_field(); ?>
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Billing Address</div>
						<div class="section_subtitle">Enter your address info</div>
						<div class="checkout_form_container">
								<div>
									<!-- Name -->
									<label for="checkout_name">Name*</label>
									<input type="text" value="<?php echo e(Auth::user()->name); ?>" id="nama" class="checkout_input" disabled>
								</div>
								<div>
									<!-- Email -->
									<label for="checkout_email">Email Address*</label>
									<input type="email" value="<?php echo e(Auth::user()->email); ?>" id="email" class="checkout_input" disabled>
								</div>
								<div>
									<!-- Phone no -->
									<label for="checkout_phone">Phone no*</label>
									<input name="no_telp" type="text" id="nomor-telp" class="checkout_input" required="required">
								</div>
								<div>
									<!-- Province -->
									<label for="checkout_province">Province*</label>
									<select name="province" id="provinsi" class="dropdown_item_select checkout_input cekongkir" required="required">
										<option>--Pilih Provinsi--</option>
                      <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($prov->id); ?>"><?php echo e($prov->title); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
								<div>
									<!-- City / Town -->
									<label for="checkout_city">City/Town*</label>
									<select name="regency" id="kota" class="dropdown_item_select checkout_input cekongkir" required="required">
                    <option>--Pilih Provinsi terlebih dahulu--</option>
										<option value=""></option>
									</select>
								</div>
								<div>
									<!-- Address -->
									<label for="checkout_address">Address*</label>
									<input type="text" id="alamat" name="address" class="checkout_input" required="required">
								</div>
								<div>
									<label for="checkout_province">Courier*</label>
									<select name="courier" id="kurir" class="dropdown_item_select checkout_input cekongkir">
                                        <option>--Pilih Kurir--</option>
                                        <?php $__currentLoopData = $kurir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k->id); ?>"><?php echo e($k->courier); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
								</div>
                <div>
                  <label for="checkout_province">Service*</label>
                  <select name="service" id="service_id" class="dropdown_item_select checkout_input">
                                        <option>--Pilih Servis--</option>                      
                                    </select>
                </div>
						</div>
					</div>
				</div>

				<!-- Order Info -->

				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Your order</div>
						<div class="section_subtitle">Order details</div>

						<!-- Order details -->
						<div class="order_list_container">
							<ul class="order_list">
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Subtotal</div>
									<div class="order_list_value ml-auto">Rp. <?php echo e($subtotal); ?></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
                  <div class="order_list_title">Shipping</div>
                  <div class="order_list_value ml-auto" id="biaya-ongkir"></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Total</div>
									<div class="order_list_value ml-auto">Rp. <span id="total-biaya"></span></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<input type="hidden" name="sub_total" value="<?php echo e($subtotal); ?>">
                  <input type="hidden" name="total" id="totalbiaya">
                  <input type="hidden" name="shipping_cost" id="ongkir">
                  <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                  <input type="hidden" name="product_id" value="<?php echo e($product_id); ?>">
									<input type="hidden" name="qty" value="<?php echo e($qty); ?>">
									
									<button type="submit" class="btn btn-primary btn-rounded" id="beli">Proceed</button>
								</li>
							</ul>
						</div>
					</div>
				</div>
      </div>
    </form>
    </div>
	</div>
	<div class="container ganti">
        <section class="section my-5 pb-5">
  
          <!-- Shopping Cart table -->
          <div style="color:#333333;" class="table-responsive">
            <h1 align="center">Rincian Produk</h1>

            <table class="table product-table">
  
              <!-- Table head -->
              <thead>
  
                <tr>
  
                  <th></th>
  
                  <th class="font-weight-bold">
  
                    <strong>Product</strong>
  
                  </th>
  
                  <th></th>
  
                  <th class="font-weight-bold">
  
                    <strong>Price</strong>
  
                  </th>
  
                  <th class="font-weight-bold">
  
                    <strong>QTY</strong>
  
                  </th>  
                  <th></th>
  
                </tr>
  
              </thead>
              <!-- Table head -->
  
              <!-- Table body -->
              <tbody>
  
                <!-- First row -->
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <?php if(is_null($item->product)): ?>
                  <th scope="row">
                    <input type="hidden" class="id_cart<?php echo e($loop->iteration-1); ?>" value="<?php echo e($item->id); ?>">
                    <input type="hidden" id="user_id" value="<?php echo e($item->user_id); ?>">
                    <input type="hidden" class="stock<?php echo e($loop->iteration-1); ?>" value="<?php echo e($item->stock); ?>">
                      <?php $__currentLoopData = $item->product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <img style="width:50px; height:50px;" src="<?php echo e(asset('/uploads/product_images/'.$image->image_name)); ?>" alt=""
                          class="img-fluid z-depth-0">
                          <?php break; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </th>
  
                  <td>
                    <h5 class="mt-3">
                      <strong><?php echo e($item->product_name); ?></strong>
                    </h5>
                  </td>
                  <td></td>
                  <?php
                      $home = new Home;
                      $hasil = $home->diskon($item->discount,$item->price);
                  ?>
                  <?php if($hasil != 0): ?>
                         <td>Rp. <span class="float-lef grey-text price<?php echo e($loop->iteration-1); ?>"><?php echo e(number_format($hasil)); ?></li>
                          Rp. <span class="float-lef grey-text"><small><s><?php echo e(number_format($item->price)); ?></s></small></span>
                        </td>
                  <?php else: ?>
                          <td>Rp. <span class="float-lef grey-text price<?php echo e($loop->iteration-1); ?>"><?php echo e(number_format($item->price)); ?></li></td>
                  <?php endif; ?>
                  <td class="text-center text-md-left">
  
                    <span class="qty<?php echo e($loop->iteration-1); ?>"><?php echo e($qty); ?></span>
  
                  </td>    

                  <?php else: ?>
                  <th scope="row">
                    <input type="hidden" class="id_cart<?php echo e($loop->iteration-1); ?>" value="<?php echo e($item->id); ?>">
                    <input type="hidden" id="user_id" value="<?php echo e($item->user_id); ?>">
                    <input type="hidden" class="stock<?php echo e($loop->iteration-1); ?>" value="<?php echo e($item->product->stock); ?>">
                      <?php $__currentLoopData = $item->product->product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <img style="width:50px; height:50px;" src="<?php echo e(asset('/uploads/product_images/'.$image->image_name)); ?>" alt="" class="img-fluid z-depth-0">
                          <?php break; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </th>
  
                  <td>
                    <h5 class="mt-3">
                      <strong><?php echo e($item->product->product_name); ?></strong>
                    </h5>
                  </td>
                  <td></td>
                  <?php
                      $home = new Home;
                      $hasil = $home->diskon($item->product->discount,$item->product->price);
                  ?>
                  <?php if($hasil != 0): ?>
                         <td>Rp. <span class="float-lef grey-text price<?php echo e($loop->iteration-1); ?>"><?php echo e(number_format($hasil)); ?></li>
                          Rp. <span class="float-lef grey-text"><small><s><?php echo e(number_format($item->product->price)); ?></s></small></span></td>
                  <?php else: ?>
                          <td>Rp. <span class="float-lef grey-text price<?php echo e($loop->iteration-1); ?>"><?php echo e(number_format($item->product->price)); ?></li></td>
                  <?php endif; ?>
                  <td class="text-center text-md-left">
                    <p class="text-danger" style="display:none" id="notif<?php echo e($loop->iteration-1); ?>"></p>
  
                    <span class="qty<?php echo e($loop->iteration-1); ?>"><?php echo e($item->qty); ?> </span>
  
                  </td>    

                  <?php endif; ?>
  
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
              </tbody>
              <!-- Table body -->
  
            </table>
  
          </div>
          <!-- Shopping Cart table -->
  
        </section>
        <input id="signup-token" name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" value="<?php echo e($weight); ?>" id="weight">
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
<script src="<?php echo e(asset ('assets/User/js/checkout.js')); ?>"></script>
<script>
    $(document).ready(function(e){
        $('#provinsi').change(function(e){
            var id_provinsi = $('#provinsi').val()
            if(id_provinsi){
                jQuery.ajax({
                    url: '/kota/'+id_provinsi,
                    type: "GET",
                    dataType: "json",
                    success:function(data){
                        $('#kota').empty();
                        $.each(data, function(key,value){
                            $('#kota').append('<option value="'+key+'">'+value+'</option>');
                        });
                    },
                });
            }else{
                $('#kota').empty();
            }
        });


var global_scope;
        $('.cekongkir').change(function(e){
            var kurir = $('#kurir').val();
            var provinsi = $('#provinsi').val();
            var kota = $('#kota').val();
            var berat = parseInt($('#weight').val());
            if(provinsi>0 && kurir>0){
                jQuery.ajax({
                    url: "<?php echo e(url('/ongkir')); ?>",
                    method: 'GET',
                    data: {
                        _token: $('#signup-token').val(),
                        destination: kota,
                        weight: berat,
                        courier: kurir,
                        prov: provinsi, 
                    },
                    success: function(result){
                        console.log(result);

                        service = result.hasil[0]['costs'];
                        document.getElementById("service_id").innerHTML += "<option selected>Pilih Service</option>";
                        global_scope = service;
                        
                        service.forEach(loopfun);
                        function loopfun(itema,index){
                          document.getElementById("service_id").innerHTML += "<option value="+index+">"+itema.service+" "+itema.cost[0].value+"</option>";
                        }
                        
                        
                        // $('#biaya-ongkir').text('Biaya Pengiriman: Rp.'+result.hasil["value"]);
                        // $('#ongkir').val(result.hasil["value"]);
                        // $('#biaya-ongkir').append('<input type="hidden" id="biaya-ongkir" value="'+result.hasil["value"]+'">');
                        // $('#biaya-ongkir').append('<li>Estimasi sampai: '+result.hasil["etd"]+'Hari</li>');
                        // $('#total-biaya').text(<?php echo e($subtotal); ?>+result.hasil["value"]);
                        // $('#totalbiaya').val(<?php echo e($subtotal); ?>+result.hasil["value"]);
                    }
                });
                // console.log('wrong');
                // console.log('kota: '+kota+' provinsi: '+provinsi+' Kurir: '+kurir)
            }else{
                console.log('wrong');
                console.log('provinsi: '+provinsi+' Kurir: '+kurir)
            }

        });

        $('#service_id').change(function(){
          console.log('ini');
          var id =document.getElementById("service_id").value;
          var chos = global_scope[id];
          console.log(chos);
          
          $('#biaya-ongkir').text('Biaya Pengiriman: Rp.'+chos.cost[0].value);
          $('#ongkir').val(chos.cost[0].value);
          $('#biaya-ongkir').append('<input type="hidden" id="biaya-ongkir" value="'+chos.cost[0].value+'">');
          $('#biaya-ongkir').append('<li>Estimasi sampai: '+chos.cost[0].etd+' Hari</li>');
          $('#total-biaya').text(<?php echo e($subtotal); ?>+chos.cost[0].value);
          $('#totalbiaya').val(<?php echo e($subtotal); ?>+chos.cost[0].value);
        });

        $('#beli').click(function(e){
          var kurir = $('#kurir').val();
          var provinsi = $('#provinsi').val();
          var kota = $('#kota').val();
          var alamat = $('#alamat').val();
          var totals = parseInt($('#total-biaya').text());
          var subtotal = parseInt('<?php echo e($subtotal); ?>');
          var ongkir = $('#biaya-ongkir').val();
          var user = $('#user_id').val();
          console.log(totals)
          if(totals==0){
            alert('Tolong Lengkapi Masukan Data');
            return false;
          }
        });
    });
</script>
</body>
</html>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\semester 4\pratikum prognet\Prognet Kelompok 23\Prognet Kelompok 23\resources\views/user/checkout.blade.php ENDPATH**/ ?>