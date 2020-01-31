<?php $__env->startSection('content'); ?>

		<h1>Update Student Data</h1>
		<!-- Fungsi succes Add Data -->
		<?php if(session('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo e(session('success')); ?>

		</div>
		<?php endif; ?>

		<div class="row">
			<div class="col-lg-12">
				<form action="/mahasiswa/<?php echo e($mahasiswa->id); ?>/update" method="POST">
					<?php echo e(csrf_field()); ?>

					<div class="form-group">
						<label for="exampleInputEmail1">First Name</label>
						<input name="first_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" value="<?php echo e($mahasiswa->first_name); ?>">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Last Name</label>
						<input name="last_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" value="<?php echo e($mahasiswa->last_name); ?>">
					</div>

					<div class="form-group">
						<label for="exampleFormControlSelect1">Choose Gender</label>
						<select name="gender" class="form-control" id="exampleFormControlSelect1">
							<option value="Male" <?php if($mahasiswa->gender == 'Male'): ?> selected <?php endif; ?>>Male</option>
							<option value="Female" <?php if($mahasiswa->gender == 'Female'): ?> selected <?php endif; ?>>Female</option>
						</select>
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Religion</label>
						<input name="religion" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Religion" value="<?php echo e($mahasiswa->religion); ?>">
					</div>

					 <div class="form-group">
					 	<label for="exampleFormControlTextarea1">Address</label>
					 	<textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Address"><?php echo e($mahasiswa->address); ?></textarea>
					 </div>

					 <button type="submit" class="btn btn-warning">Update</button>
				</form>
			</div>
		</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tugas-laravel-crud\resources\views/mahasiswa/edit.blade.php ENDPATH**/ ?>