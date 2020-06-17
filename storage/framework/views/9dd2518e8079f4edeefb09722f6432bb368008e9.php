<?php $__env->startSection('content'); ?>
     <!-- Main Layout -->
  <main>
    <div style="margin-top:120px;" class="container mt-5 pt-3">

      <!-- Grid row -->
      <div class="row" style="margin-top: -140px;">

        <!-- Grid column -->
        <div class="col-md-12">

          <div class="card pb-5">

            <div class="card-body">

              <div class="container">

                <!-- Section: Contact v.3 -->
                <section class="contact-section my-5">
                  <!-- Form with header -->
                  <div class="card">

                    <!-- Grid row -->
                    <div class="row">

                      <!-- Grid column -->
                      <div class="col-lg-8">

                        <div class="card-body form">

                          <!-- Header -->
                          <h3 class="mt-4">Detail Transaksi</h3>
                          <br>
                          <!-- Grid row -->
                          <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-contact-name" class="">Nama Penerima</label>
                                <input type="text" id="nama" class="form-control" value="<?php echo e($transaksi->user->name); ?>" disabled>
                              </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-contact-email" class="">Email</label>
                                <input type="email" id="email" class="form-control" value="<?php echo e($transaksi->user->email); ?>" disabled>
                              </div>

                            </div>
                            <!-- Grid column -->

                          </div>
                          <!-- Grid row -->

                          <!-- Grid row -->
                          <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-contact-phone" class="">Nomor Telepon</label>
                                <input type="text" id="nomor-telp" class="form-control" value="<?php echo e($transaksi->telp); ?>" disabled>
                              </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-province" class="">Provinsi</label>
                                <input type="text" id="nomor-telp" class="form-control" value="<?php echo e($transaksi->province); ?>" disabled>
                              </div>

                            </div>
                            <div class="col-md-12">

                                <div class="md-form mb-0">
                                    <label for="form-regecy" class="">Kota</label>    
                                    <input type="text" id="nomor-telp" class="form-control" value="<?php echo e($transaksi->regency); ?>" disabled>
                                </div>
  
                            </div>
                            <div class="col-md-12">

                                <div class="md-form mb-0">
                                    <label for="form-contact-company" class="">Alamat</label>
                                    <input type="text" id="alamat" class="form-control" value="<?php echo e($transaksi->address); ?>" disabled>
                                </div>
  
                            </div>
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <label for="form-contact-company" class="">Kurir</label>
                                  <input type="text" id="alamat" class="form-control" value="<?php echo e($transaksi->courier->courier); ?>" disabled>
  
                                </div>
                            </div>

                            <!-- Grid column -->

                          </div>
                          <!-- Grid row -->

                          <!-- Grid row -->


                        </div>

                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="col-lg-4">

                        <div class="card-body">

                          <h3 class="my-4 pb-2">Rangkuman Pesanan</h3>
                          <br>
                          <label>Summary</label>
                          <ul class="text-lg-left list-unstyled ml-4">

                            <li>
                              <h6>Status: 
                                <span class="badge blue">
                                <?php if($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment)): ?>
                                    Menunggu Konfirmasi
                                <?php else: ?>
                                <?php echo e($transaksi->status); ?>

                                <?php endif; ?></span>
                              </h6>
                            </li>
                            <li>
                                <h6>Sub Biaya: Rp.<?php echo e($transaksi->sub_total); ?></h6>
                            </li>
                            <li>
                                <h6 id="biaya-ongkir">Biaya Pengiriman: Rp.<?php echo e($transaksi->shipping_cost); ?></h6>
                            </li>
                            <li>
                                <h6>Total Biaya: Rp.<?php echo e($transaksi->total); ?></h6>
                            </li>
                            <li>
                            <h6>Bukti Pembayaran: 
                                <?php if(is_null($transaksi->proof_of_payment)): ?>
                                <span class="badge success-color">Not yet</span>
                                <?php else: ?>
                                <span class="badge success-color">Already</span>
                                <?php endif; ?>
                            </h6>
                          </li>
                            <br>
                            
                            <li>
                                    <?php if($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment)): ?>
                                        <br>
                                        <div class="d-flex flex-row bd-highlight mb-3">
                                            <form action="/transaksi/detail/status" method="POST">
                                              <?php echo csrf_field(); ?>
                                              <input type="hidden" name="id" value="<?php echo e($transaksi->id); ?>">
                                              <input type="hidden" name="status" value="3">
                                              <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apa yakin ingin acc pesanan ini?')">Verify</button>
                                            </form>
                                        </div>  
                                    <?php endif; ?>

                                    <?php if($transaksi->status === 'verified'): ?>
                                            <div class="d-flex flex-row bd-highlight mb-3">
                                            <form action="/transaksi/detail/status" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($transaksi->id); ?>">
                                                <input type="hidden" name="status" value="4">
                                                <button type="submit" class="btn btn-success btn-sm">Deliver Products</button>
                                            </form>
                                        </div>  
                                    <?php endif; ?>
                                    
                                        <?php if(is_null($transaksi->proof_of_payment)): ?>
                                       
                                        <?php else: ?>
                                            <div style="margin-top:10px;" class="d-flex justify-content-center">
                                                <button id="tombol" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalContactForm">Proof Of Payment</button>
                                            </div>
                                        <?php endif; ?>

                                        <div style="margin-top:10px;" class="d-flex justify-content-center">
                                          <a href="/admin/transaksi"><button class="btn btn-warning btn-rounded">Back</button></a>
                                        </div>
                            </li>

                          </ul>
                        </div>
                      </div>
                      <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                  </div>
                  <!-- Form with header -->
                </section>
                <!-- Section: Contact v.3 -->

              </div>

            </div>

          </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>

  </main>
  <!-- Main Layout -->
      <!-- Main Container -->
      <br><br>
      <div style="width:1000px;" class="container">
        <section class="section my-5 pb-5">
  
          <!-- Shopping Cart table -->
          <div class="table-responsive">
            <h1 align="center">Rincian Produk</h1>
            <br>
            <table class="table">
  
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
                      
                          <img style="width:100px;height:100px;" src="<?php echo e(asset('/uploads/product_images/'.$image->image_name)); ?>" alt=""class="img-fluid z-depth-0">
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
                  <td>Rp.<?php echo e($item->selling_price); ?></td>
                  <td class="text-center text-md-left">
  
                    <span><?php echo e($item->qty); ?> </span>
  
                  </td>

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
      <div class="modal" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <div class="modal-content">
      
          <!-- Header -->
          <div class="modal-header light-blue darken-3 white-text">
            <h4>Bukti Pembayaran</h4>
          </div>
      
          <!-- Body -->
          <div class="modal-body mb-0">
            <div align="center" class="d-flex justify-content-center">
                <img style="width:300px;height:300px;" src="<?php echo e(url('proof_payment/'.$transaksi->proof_of_payment)); ?>"  id="output_image" onload="preview_image(event)" class="mb-2 mw-50 w-50 h-50 rounded">
              </div>
          </div>
        </div>
        <!-- Content -->
      </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\barud\Downloads\Compressed\Prognet Kelompok 23\resources\views/product/admintransaksidetail.blade.php ENDPATH**/ ?>