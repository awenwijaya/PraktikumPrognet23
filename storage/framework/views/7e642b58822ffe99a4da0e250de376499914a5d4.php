<?php $__env->startSection('content'); ?>

<style>
	.thumbnail{
		display: inline-block;
		height: 100px;
		margin: 10px;    
	}
</style>

<div class="container">
	<div class="row align-items-centre">
		<div class="col-lg-2">
		</div>
		<div class="col-md-8">
			<div class="component">
				<div class="card">
					<form class="form-signin" action="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
					<div class="card-header">
						<center>
							<h2>Tambah Produk</h2>
							<br>
						</center>
					</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" class="form-control" placeholder="Nama Produk" aria-label="Nama Produk" aria-describedby="basic-addon1" name="product_name">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" class="form-control" placeholder="Harga" aria-label="Harga Satuan" aria-describedby="basic-addon1" name="price">
					</div>
					<div class="form-group">
						<label>Stock</label>
						<input type="text" class="form-control" placeholder="Stock" aria-label="Stock" aria-describedby="basic-addon1" name="stock">
					</div>
					<div class="form-group">
						<label>Berat Produk</label>
						<input type="text" class="form-control" placeholder="Berat Produk" aria-label="Berat Produk" aria-describedby="basic-addon1" name="weight">
					</div>
					<div class="form-group">
						<label class="control-label">Kategori</label>
						<select name="category_id[]" class="selectpicker form-control" multiple data-live-search="true"  multiple="multiple" required>
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
						<br>
					</div>
					<div class="form-group">
						<strong>Description</strong>
						<textarea class="form-control" col="4" name="description" placeholder="Deskripsi Produk"></textarea>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>Pilih Foto</label>
							<input type="file" class="form-control" placeholder="Nama Produk" aria-label="Nama Produk" aria-describedby="basic-addon1" name="files[]" multiple required id="files">
							<output id="result" />
						</div>	
					</div>
						<div class="card-footer" align="center">
							<button class="btn btn-md btn-primary btn-icon-text" type="submit">
								<i class="mdi mdi-arrow-right btn-icon-prepend fa fa-plus"></i> Add Product
							</button>
						</div>
					</form>
					
				<?php if(count($errors) > 0): ?>
				<div class="alert alert-danger">
					<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
        
		//Check File API support
		if(window.File && window.FileList && window.FileReader)
		{
			var filesInput = document.getElementById("files");
			
			filesInput.addEventListener("change", function(event){
				
				
				var files = event.target.files; //FileList object
				var output = document.getElementById("result");
				
				output.innerHTML = "";
				
				for(var i = 0; i< files.length; i++)
				{
					var file = files[i];
					
					//Only pics
					if(!file.type.match('image'))
					  continue;
					
					var picReader = new FileReader();
					
					picReader.addEventListener("load",function(event){
						
						var picFile = event.target;
						
						var div = document.createElement("span");
						
						div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
								"title='" + picFile.name + "'/>";
						
						output.insertBefore(div,null);            
					
					});
					
					 //Read the image
					picReader.readAsDataURL(file);
				}                               
			   
			});
		}
		else
		{
			console.log("Your browser does not support File API");
		}
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\semester 4\pratikum prognet\Prognet Kelompok 23\Prognet Kelompok 23\resources\views/product/admincreate.blade.php ENDPATH**/ ?>