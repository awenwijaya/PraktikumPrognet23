<!DOCTYPE html>
<html lang="en">
<head>
<title>Transaction | Estore.</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<div class="home_background" style="background-image:url(/assets/User/images/cart.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
                    <div class="home_title" style="font-size: 30px; color:#e95a5a;"><?php echo e(Auth::user()->name); ?>'s Transaction</div>
										<li><a href="/home" style="font-size: 25px">Home</a></li>
                    <?php if(auth()->guard()->check()): ?>
                    <li><a href="/transaksi/<?php echo e(Auth::user()->id); ?>" style="font-size: 25px">Transaction</a></li>
                    <?php endif; ?>
										<li><a style="font-size: 25px">Transaction Details</a></li>
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
			<div class="row">
				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Billing Address</div>
						<div class="section_subtitle">Your address info</div>
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
									<input type="phone" id="checkout_phone" value="<?php echo e($transaksi->telp); ?>" class="checkout_input" disabled>
								</div>
								<div>
									<!-- Province -->
									<label for="checkout_province">Province*</label>
									<input type="phone" id="checkout_phone" value="<?php echo e($transaksi->province); ?>" class="checkout_input" disabled>
								</div>
								<div>
									<!-- City / Town -->
									<label for="checkout_city">City/Town*</label>
									<input type="phone" id="checkout_phone" value="<?php echo e($transaksi->regency); ?>" class="checkout_input" disabled>
								</div>
								<div>
									<!-- Address -->
									<label for="checkout_address">Address*</label>
									<input type="text" id="alamat" name="address" value="<?php echo e($transaksi->address); ?>" class="checkout_input" disabled>
								</div>
								<div>
									<label for="checkout_province">Courier*</label>
									<input type="text" id="alamat" name="address" value="<?php echo e($transaksi->courier->courier); ?>" class="checkout_input" disabled>
								</div>
						</div>
					</div>
				</div>
				<!-- Order Info -->
				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Your order</div>
						<div class="section_subtitle">Order Summary</div>
						<!-- Order details -->
						<div class="order_list_container">
							<ul class="order_list">
                <?php
                  if($transaksi->status == 'unverified' && !is_null($transaksi->proof_of_payment))
                  {$transaksi->status = 'Menunggu Verifikasi';}
                ?>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Status</div>
									<div class="order_list_value ml-auto">
                    <?php if($transaksi->status == 'success'): ?>
                      <span style="color: white;" class="badge badge-success"><?php echo e($transaksi->status); ?></span>
                    <?php else: ?>
                      <span style="color: white;" class="badge badge-warning"><?php echo e($transaksi->status); ?></span>
                    <?php endif; ?>
                  </div>
                </li>
                <li class="d-flex flex-row align-items-center justify-content-start">
                  <div class="order_list_title">Sub Total</div>
                  <div class="order_list_value ml-auto">Rp. <?php echo e($transaksi->sub_total); ?></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
                  <div class="order_list_title">Shipping</div>
                  <div class="order_list_value ml-auto" id="biaya-ongkir">Rp <?php echo e($transaksi->shipping_cost); ?></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Total</div>
									<div class="order_list_value ml-auto">Rp. <?php echo e($transaksi->total); ?><span id="total-biaya"></span></div>
                </li>
                <li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Proof Of Payment</div>
									<div class="order_list_value ml-auto">
                    <?php if(is_null($transaksi->proof_of_payment)): ?>
                      Belum di Upload
                    <?php else: ?>
                      Sudah di Upload
                    <?php endif; ?>
                  </div>
                </li>
                <br>
								<li>
                  <?php if($transaksi->status == 'unverified' && is_null($transaksi->proof_of_payment)): ?>
                      <br>
                      <div class="d-flex flex-row bd-highlight mb-3">
                          <button style="margin-left:35px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalContactForm">Upload Bukti Pembayaran</button>
                          <form action="/transaksi/detail/status" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($transaksi->id); ?>">
                            <input type="hidden" name="status" value="1">
                            <button style="color:white;margin-left:10px;" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apa yakin ingin membatalkan pesanan ini?')">Batalkan Pesanan</button>
                          </form>
                      </div>  
                  <?php else: ?>
                      <?php if($transaksi->status == 'delivered'): ?>
                      <div class="d-flex flex-row bd-highlight mb-3">
                        <form action="/transaksi/detail/status" method="POST">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="id" value="<?php echo e($transaksi->id); ?>">
                          <input type="hidden" name="status" value="2">
                          <button style="margin-left:126px;" type="submit" class="btn btn-primary btn-sm">Pesanan Sudah Sampai</button>
                        </form>
                    </div> 
                      <?php endif; ?>
                  <?php endif; ?>
                      <div class="d-flex justify-content-center">
                        <a href="/home"><button style="color:white;" class="btn btn-primary btn-rounded fa fa-home fa-2x"></button></a>
                      </div>
              </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
    </div>
	</div>
	<div class="container ganti">
    <section class="section my-5 pb-5">
      <!-- Shopping Cart table -->
      <div style="color:#333333;" class="table-responsive">
        <h1 align="center">Rincian Produk</h1>
        <table class="table product-table table-cart-v-1">
          <!-- Table head -->
          <thead>
            <tr>
              <th></th>
              <th class="font-weight-bold">
                <strong>Product</strong>
              </th>
              <th></th>
              <th class="font-weight-bold">
                <strong>Diskon</strong>
              </th>
              <th class="font-weight-bold">
                <strong>Price</strong>
              </th>
              <th class="font-weight-bold">

                <strong>QTY</strong>

              </th>  
              <th></th>
              <?php if($transaksi->status == 'success'): ?>
              <th class="font-weight-bold">
                <strong>Berikan Review</strong>
              </th> 
              <?php endif; ?>
            </tr>

          </thead>
          <!-- Table head -->

          <!-- Table body -->
          <tbody>

            <!-- First row -->
            <?php $__currentLoopData = $transaksi->transaction_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th scope="row">
                  <?php $__currentLoopData = $item->product->product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                      <img style="width:50px; height:50px;" src="<?php echo e(asset('/uploads/product_images/'.$image->image_name)); ?>" alt="" class="img-fluid z-depth-0">
                      <?php break; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </th>
              <td>
                <h5 class="mt-3">
                  <input type="hidden" name="id" id="product_id<?php echo e($loop->iteration-1); ?>" value="<?php echo e($item->product->id); ?>">
                  <strong><?php echo e($item->product->product_name); ?></strong>
                </h5>
              </td>
              <td></td>
              <td><?php echo e($item->discount); ?>%</td>
              <td>Rp. <?php echo e($item->selling_price); ?></td>
              <td class="text-center text-md-left">

                <span><?php echo e($item->qty); ?> </span>

              </td>
              <td></td>
              <?php if($transaksi->status == 'success'): ?>
              <td>
                  <?php
                      $status = 0;
                  ?>
                  <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php
                           if($item->product->id == $pr->product_id){
                              $status = $status + 1;
                           }else{
                              $status = $status;
                           }
                       ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($status != 0): ?>
                      
                      <button class="btn btn-sm btn-success tambah-review" data-toggle="modal" data-target="#modalTambahReview" disabled>Review telah diberikan</button>
                      
                  <?php else: ?>
                      <button class="btn btn-sm btn-success tambah-review" data-toggle="modal" data-target="#modalTambahReview">+Tambah Review</button>
                      
                  <?php endif; ?>
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
  </div>
  <!-- Main Container -->

    <!-- Modal: Contact form -->
    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <div class="modal-content">

          <!-- Header -->
          <div class="modal-header light-blue darken-3 white-text">
            <h4 class="">Bukti Pembayaran</h4>
            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <!-- Body -->
          <div class="modal-body mb-0">
            <form action="/transaksi/detail/proof" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
            <div class="md-form form-sm">
              Upload Bukti Pembayaran
              <input type="hidden" name="id" value="<?php echo e($transaksi->id); ?>">
              <input type="file" name="file" id="form19" class="form-control form-control-sm" accept=".jpeg,.jpg,.png,.gif" onchange="preview_image(event)" required>
            </div>
            <br><br>
            <div class="text-center mt-1-half">
              <button type="submit" class="btn btn-info mb-2">Send</button>
            </div>
            </form>
          </div>
          <div class="d-flex justify-content-center">
            <img id="output_image" class="mb-2 mw-50 w-50 h-50 rounded">
          </div>
        </div>
        <!-- Content -->
      </div>
    </div>
    <!-- Modal: Contact form -->

    <!-- Modal: Tambah Review -->
    <div class="modal fade" id="modalTambahReview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
      <!-- Content -->
      <div class="modal-content">

        <!-- Header -->
        <div class="modal-header light-blue darken-3 white-text">
          <h4 class="">Tambah Rating dan Review Produk</h4>
          <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- Body -->
        <div class="modal-body mb-0">
            <input type="hidden" name="product_id" id="product_id" value="">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>">
            <input id="signup-token" name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
          <div class="md-form form-sm">
            Masukkan Rate untuk Produk
            <select name="rate" id="rate" class="form-control form-control-sm">
              <?php for($i = 0; $i < 6; $i++): ?>
              <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
              <?php endfor; ?>
            </select>
          </div>
          <br><br>
          <div class="md-form form-sm">
            <textarea type="text" id="content" class="md-textarea form-control form-control-sm" rows="3" required></textarea>
          </div>
          <br><br>
          <div class="text-center mt-1-half">
            <button type="submit" class="btn btn-info mb-2" id="kirim-review">Send</button>
          </div>
        </div>
      </div>
      <!-- Content -->
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
<script src="<?php echo e(asset ('assets/User/js/checkout.js')); ?>"></script>
<script>
  $(document).ready(function(e){
       $(".tambah-review").click(function(e){
        var index = $(".tambah-review").index(this);
        var product_id = $("#product_id"+index).val();
        $("#product_id").val(product_id);
      });

      $("#kirim-review").click(function(e){
        jQuery.ajax({
              url: "<?php echo e(url('/transaksi/detail/review')); ?>",
              method: 'post',
              data: {
                  _token: $('#signup-token').val(),
                  product_id: $("#product_id").val(),
                  user_id: $("#user_id").val(),
                  rate: $("#rate").val(),
                  content: $("#content").val(),
              },
              success: function(result){
                $('#modalTambahReview').modal('hide');
                alert('Berhasil Menambah Review');
                location.reload();
              }
          });
      });
  
        
  });
</script>
<script type="text/javascript">
  function preview_image(event){
    let reader = new FileReader();
    var fileExtention = '';
    reader.onload = function(){
      let output = document.getElementById('output_image');
      output.src = reader.result;
      fileExtention = output.src.split('/');
      fileExtention = fileExtention[1];
      fileExtention = fileExtention.split(';');
      console.log(fileExtention[0]);
    }
    if(event.target.files[0]){
      reader.readAsDataURL(event.target.files[0]);
    }
  }
</script>
</body>
</html>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\awenh\Desktop\Prognet Kelompok 23\Prognet Kelompok 23\resources\views/user/detailtransaksi.blade.php ENDPATH**/ ?>