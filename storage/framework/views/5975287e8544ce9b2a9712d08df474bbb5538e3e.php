<?php $__env->startSection('content'); ?>
     <!-- Main Layout -->
  <main>
    <div style="margin-top:120px;">

      <!-- Grid row -->
      <div class="row" style="margin-top: -140px;">

        <!-- Grid column -->
        <div class="col-md-12">

            <div class="card-body">

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
                          
                          <br>
                          <label>Summary</label>
                          <ul>

                            <li>
                              <h5>Status : 
                                <?php if($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment)): ?>
                                <span class="label label-warning">
                                    Menunggu Konfirmasi</span>
                                <?php else: ?>
                                <span class="label label-success">
                                <?php echo e($transaksi->status); ?></span>
                                <?php endif; ?>
                              </h5>
                            </li>
                            <li>
                                <h5>Sub Biaya : Rp. <?php echo e(number_format($transaksi->sub_total)); ?></h5>
                            </li>
                            <li>
                                <h5 id="biaya-ongkir">Biaya Pengiriman : Rp. <?php echo e(number_format($transaksi->shipping_cost)); ?></h5>
                            </li>
                            <li>
                                <h5>Total Biaya : Rp. <?php echo e(number_format($transaksi->total)); ?></h5>
                            </li>
                            <li>
                            <h5>Bukti Pembayaran: 
                                <?php if(is_null($transaksi->proof_of_payment)): ?>
                                <span class="label label-warning">Belum Diupload</span>
                                <?php else: ?>
                                <span class="label label-success">Sudah Diupload</span>
                                <?php endif; ?>
                            </h5>
                          </li>
                            <br>
                            
                                    <?php if($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment)): ?>
                                        <br>
                                        <div class="d-flex flex-row bd-highlight mb-3">
                                            <form action="/admin/transaksi/detail/status" method="POST">
                                              <?php echo csrf_field(); ?>
                                              <input type="hidden" name="id" value="<?php echo e($transaksi->id); ?>">
                                              <input type="hidden" name="status" value="3">
                                              <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin untuk verifikasi pesanan ini?')">Verify</button>
                                            </form>
                                        </div>  
                                    <?php endif; ?>

                                    <?php if($transaksi->status === 'verified'): ?>
                                            <div style="margin-top:10px;">
                                            <form action="/admin/transaksi/detail/status" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($transaksi->id); ?>">
                                                <input type="hidden" name="status" value="4">
                                                <button type="submit" class="btn btn-success btn-sm">Deliver Products</button>
                                            </form>
                                        </div>  
                                    <?php endif; ?>
                                    
                                        <?php if(is_null($transaksi->proof_of_payment)): ?>
                                       
                                        <?php else: ?>
                                            <div style="margin-top:10px;">
                                                <button id="tombol" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalContactForm">Proof Of Payment</button>
                                            </div>
                                        <?php endif; ?>

                                        <div style="margin-top:10px;">
                                          <a href="/admin/transaksi"><button class="btn btn-warning btn-rounded">Back</button></a>
                                        </div>

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
              <!-- Main Layout -->
      <!-- Main Container -->
      
      <div class="card-body">
      <div style="width:1000px;" class="container">
  
          <!-- Shopping Cart table -->
          <div class="table-responsive">

                      <!-- Grid column -->
                      <div class="col-lg-12">

                        <div class="card-body form">
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
                  <td>Rp. <?php echo e(number_format($item->selling_price)); ?></td>
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

            </div>

          </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>

  </main>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.transaksi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\Prognet Kelompok 23\resources\views/product/admintransaksidetail.blade.php ENDPATH**/ ?>