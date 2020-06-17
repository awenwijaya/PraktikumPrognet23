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
            <h2 class="card-title" align="center">List Kategori</h2>
            <br>
            <button type="button" class="btn-sm btn-success btn-icon-text" onclick="">
                    <i class="mdi mdi-upload btn-icon-prepend fa fa-plus"></i>     
                    <a href="<?php echo e(route('categories.create')); ?>" style="color: white;">Tambah Kategori</a>
            </button>
            <button type="button" class="btn-sm btn-danger btn-icon-text" onclick="">
                <i class="mdi  mdi-delete btn-icon-prepend fa fa-trash"></i>
                <a href="/categories-trash" style="color: white">Trash</a>
            </button>
              <table class="table table-striped table-hover"style="width:1100px;">
                <thead>
                  <tr>
                    <th>
                      No.
                    </th>
                    <th>
                      Nama Kategori
                    </th>
                    <th colspan="2" >
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($category->category_name); ?></td>
                    <td style="align: center;">
                        <a class="btn-sm btn-warning fa fa-pencil" href="<?php echo e(route('categories.edit',$category->id)); ?>"></a>        
                        <a class="btn-sm btn-danger fa fa-trash" href="/categories/delete/<?php echo e($category->id); ?>" onclick="return confirm('Apa yakin ingin menghapus data ini?')"></a>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <?php echo $categories->links(); ?>

          </div>
<br><br><br><br><br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.categori', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\Prognet Kelompok 23\resources\views/category/listcategory.blade.php ENDPATH**/ ?>