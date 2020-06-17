<?php $__env->startSection('content'); ?>
<?php for($i = 1; $i <= 12; $i++): ?>
<input type="hidden" id='bulan<?php echo e($i); ?>' value="<?php echo e($bulan[$i]); ?>">
<?php endfor; ?>
 <div class="col-md-8 grid-margin stretch-card" > 
  <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
  <div class="card">
   <div class="card-body">
    <div id="chartContainer" style="height: 500px; max-width: 1000px; margin: auto; "></div>
   </div>
  </div>
 </div>
   <!-- /.sidebar-menu -->

 <div class="col-md-4 market-update-gd">
  <div class="market-update-block clr-block-1">
   <div class="col-md-8 market-update-left">
    <h3><?php echo e(\App\User::all()->count()); ?></h3>
    <h4>Registered User</h4>
   </div>
   <div class="col-md-4 market-update-right">
    <i class="fa fa-file-text-o"> </i>
   </div>
    <div class="clearfix"> </div>
  </div>
 </div>
 <div class="col-md-4 market-update-gd" style="margin-top: 35px;">
  <div class="market-update-block clr-block-2">
   <div class="col-md-8 market-update-left">
   <h3><?php echo e(\App\Transaction::all()->count()); ?></h3>
   <h4>Transaction</h4>
    </div>
   <div class="col-md-4 market-update-right">
    <i class="fa fa-eye"> </i>
   </div>
    <div class="clearfix"> </div>
  </div>
 </div>
 <div class="col-md-4 market-update-gd" style="margin-top: 35px;">
  <div class="market-update-block clr-block-1">
   <div class="col-md-8 market-update-left">
    <h3><?php echo e(\App\Product::all()->count()); ?></h3>
    <h4>Active Product</h4>
   </div>
   <div class="col-md-4 market-update-right">
    <i class="fa fa-envelope-o"> </i>
   </div>
    <div class="clearfix"> </div>
  </div>
 </div>
   <div class="clearfix"> </div>
<input id="signup-token" name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
<div class="row">
    <div class="col-md-6 market-update-right">
      <div class="market-update-block clr-block-3">
        <div class="card-body">
    <h4 class="font-weight-normal mb-3">Transaksi Bulan 
     <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
    <select name="bulan" id="bulan" style="
            margin-bottom: 1em;
            padding: .25em;
            border: 0;
            font-weight: bold;
            letter-spacing: .15em;
            color: white;
            background-color: rgba(255,255,255,0.1);
            border-radius: 0;
            &:focus, &:active {
              outline: 0;
              border-bottom-color: red;
              color: black;
            }
          ">
              <option value="1" style="color:black" <?php if(date('m') == 1): ?>
                  selected
              <?php endif; ?>>Januari</option>
              <option value="2" style="color:black"  <?php if(date('m') == 2): ?>
              selected
          <?php endif; ?>>Februari</option>
              <option value="3" style="color:black"  <?php if(date('m') == 3): ?>
              selected
          <?php endif; ?>>Maret</option>
              <option value="4" style="color:black"  <?php if(date('m') == 4): ?>
              selected
          <?php endif; ?>>April</option>
              <option value="5" style="color:black"  <?php if(date('m') == 5): ?>
              selected
          <?php endif; ?>>Mei</option>
              <option value="6" style="color:black"  <?php if(date('m') == 6): ?>
              selected
          <?php endif; ?>>Juni</option>
              <option value="7" style="color:black"  <?php if(date('m') == 7): ?>
              selected
          <?php endif; ?>>Juli</option>
              <option value="8" style="color:black"  <?php if(date('m') == 8): ?>
              selected
          <?php endif; ?>>Agustus</option>
              <option value="9" style="color:black"  <?php if(date('m') == 9): ?>
              selected
          <?php endif; ?>>September</option>
              <option value="10" style="color:black"  <?php if(date('m') == 10): ?>
              selected
          <?php endif; ?>>Oktober</option>
              <option value="11" style="color:black"  <?php if(date('m') == 11): ?>
              selected
          <?php endif; ?>>November</option>
              <option value="12" style="color:black"  <?php if(date('m') == 12): ?>
              selected
          <?php endif; ?>>Desember</option>
          </select>
          </h4>
          <?php
              setlocale(LC_MONETARY,"id_ID");
          ?>
          <h2 class="mb-2">Jumlah Transaksi: <span><strong id="total"><?php echo e($status['total']); ?></strong></span></h2>
          <p>Unverified Transaction <span> <strong id="unverified"><?php echo e($status['unverified']); ?></strong></span></p>
          <p>Expired Transaction <span><strong id="expired"><?php echo e($status['expired']); ?></strong></span></p>
          <p>Canceled Transaction <span><strong id="canceled"><?php echo e($status['canceled']); ?></strong></span></p>
          <p>Verified Transaction <span><strong id="verified"><?php echo e($status['verified']); ?></strong></span></p>
          <p>Delivered Transaction <span><strong id="delivered"><?php echo e($status['delivered']); ?></strong></span></p>
          <p>Success Transaction <span><strong id="success"><?php echo e($status['success']); ?></strong></span></p>
          <h4>Total Penghasilan <span><strong id="harga">Rp <?php echo e(number_format($status['harga'],0,',','.')); ?></strong></span></h4>
        </div>
      </div>
 </div>
 <div class="col-md-6 market-update-gd">
  <div class="market-update-block clr-block-3">
    <div class="card-body">
   <h4 class="font-weight-normal mb-3">Transaksi Tahun <select name="tahun" id="tahun" style="
     margin-bottom: 1em;
     padding: .25em;
     border: 0;
     font-weight: bold;
     letter-spacing: .15em;
     color: white;
     background-color: rgba(255,255,255,0.1);
     border-radius: 0;
     &:focus, &:active {
    outline: 0;
    border-bottom-color: red;
    color: black;
     }
   ">
   <?php for($i = 2019; $i <= date('Y'); $i++): ?>
    <option value="<?php echo e($i); ?>" <?php if($i == date('Y')): ?>
     selected
    <?php endif; ?> style="color:black"><?php echo e($i); ?></option>
   <?php endfor; ?>
   </select> <i class="mdi mdi-diamond mdi-24px float-right"></i>
   </h4>
   <h2 class="mb-2">Jumlah Transaksi: <span><strong id="total-tahun"><?php echo e($transaksi_tahun->count()); ?></strong></span></h2>
   <p>Unverified Transaction <span> <strong id="unverified-tahun"><?php echo e($status_tahun['unverified']); ?></strong></span></p>
   <p>Expired Transaction <span><strong id="expired-tahun"><?php echo e($status_tahun['expired']); ?></strong></span></p>
   <p>Canceled Transaction <span><strong id="canceled-tahun"><?php echo e($status_tahun['canceled']); ?></strong></span></p>
   <p>Verified Transaction <span><strong id="verified-tahun"><?php echo e($status_tahun['verified']); ?></strong></span></p>
   <p>Delivered Transaction <span><strong id="delivered-tahun"><?php echo e($status_tahun['delivered']); ?></strong></span></p>
   <p>Success Transaction <span><strong id="success-tahun"><?php echo e($status_tahun['success']); ?></strong></span></p>
   <h4>Total Penghasilan <span><strong id="harga-tahun">Rp <?php echo e(number_format($status_tahun['harga'],0,',','.')); ?></strong></span></h4>
    </div>
  </div>
   </div>
 </div>
<!--market updates end here-->
<!--mainpage chit-chating-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\Prognet Kelompok 23\resources\views/admin.blade.php ENDPATH**/ ?>