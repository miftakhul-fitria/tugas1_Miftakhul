	

	<?php $__env->startSection('content'); ?>

			<!-- Fungsi succes Add Data -->
			<?php if(session('success')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo e(session('success')); ?>

			</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-6">
					<h1>Student Data</h1>
				</div>

				<div class="col-6">
					<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">+Add Data</button>
				</div>
				
				<table class="table table-hover">
					<tr>
						<th>FIRST NAME</th>
						<th>LAST NAME</th>
						<th>GENDER</th>
						<th>RELIGION</th>
						<th>ADDRESS</th>
						<th>ACTION</th>
					</tr>
					<?php $__currentLoopData = $data_mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($mahasiswa->first_name); ?></td>
						<td><?php echo e($mahasiswa->last_name); ?></td>
						<td><?php echo e($mahasiswa->gender); ?></td>
						<td><?php echo e($mahasiswa->religion); ?></td>
						<td><?php echo e($mahasiswa->address); ?></td>
						<td>
							<a href="/mahasiswa/<?php echo e($mahasiswa->id); ?>/show" class="btn btn-primary btn-sm">Show</a>
							<a href="/mahasiswa/<?php echo e($mahasiswa->id); ?>/edit" class="btn btn-warning btn-sm">Update</a>
							<a href="/mahasiswa/<?php echo e($mahasiswa->id); ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm('Sure it will be removed ?')">Delete</a>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form action="/mahasiswa/create" method="POST">
							<?php echo e(csrf_field()); ?>

							<div class="form-group">
								<label for="exampleInputEmail1">First Name</label>
								<input name="first_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Last Name</label>
								<input name="last_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
							</div>

							<div class="form-group">
								<label for="exampleFormControlSelect1">Choose Gender</label>
								<select name="gender" class="form-control" id="exampleFormControlSelect1">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Religion</label>
								<input name="religion" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Religion">
							</div>

							 <div class="form-group">
							 	<label for="exampleFormControlTextarea1">Address</label>
							 	<textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Address"></textarea>
							 </div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

						<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tugas-laravel-crud\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>