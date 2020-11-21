      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Profile
            <small>Profile Panel</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
			<div class="col-xs-12">
				<div class="box">
				  <div class="box-header">
					<div class="margin">
						<div class="row">
							<div class="col-xs-12">
								<?= $this->session->flashdata('message');?>
							</div>
						</div>
						<div class="card mb-3 col-xs-12">
							<div class="row no-gutters">
								<div class="card col-xs-2">
									<img src="<?= base_url('assets/images/profile/'). $user['image'];?>" class="img-thumbnail"  width="200px" hight="200px" alt="...">
								</div>
								<div class="col-xs-8">
									<div class="card-body">
										<h5 class="card-title"><strong><?= $user['name'];?></strong></h5>
										<h5 class="card-title"><strong><?= $user['username'];?></strong></h5>
										<p class="card-text"><?= $user['email'];?></p>
										<p class="card-text"><?= $user['phone'];?></p>
										<p class="card-text"><?= $user['address'];?></p>
										<p class="card-text"><?= $user['dept'];?> | <?= $user['position'];?></p>
										<p class="card-text"><small class="text-muted">Member since : <strong><?= date('d-m-Y', strtotime($user['createdAt']));?></strong></small></p>
									</div>
									<div class="btn-group mt-5">
										<button type="button" class="btn btn-primary btn-md-left" data-toggle="modal" data-target="#editProfileModal<?= $user['id'];?>">
											<i class="zmdi zmdi-plus"></i>Edit Profile
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				  </div>
				</div>
			</div>
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <!-- modal editProfile -->
		<div class="modal fade" id="editProfileModal<?= $user['id'];?>" tabindex="-1" role="dialog" aria-labelledby="editProfileModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editProfileModal">Edit User</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<?= form_open_multipart('admin/editprofile');?>
								<input type="hidden" name="id" id="id" value="<?= $user['id'];?>" >
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Full Name" value="<?= $user['name'];?>" >
								</div>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?= $user['username'];?>" readonly >
								</div>
								<div class="form-group">
									<div class="col-sm"> <label>Picture</label></div>
									<div class="col-sm">
										<img src="<?= base_url('assets/images/profile/').$user['image'];?>" class="img-thumbnail" width="150px" hight="150px" >
									</div>
									<div class="col-sm">
										<div class="custom-file">
										<input type="file" class=" form-control custom-file-input" id="image" name="image">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?= $user['email'];?>">
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number" value="<?= $user['phone'];?>">
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" type="text" name="address" id="address" placeholder="Address" ><?= $user['address'];?></textarea>
								</div>
								<div class="form-group">
									<label>Department</label>
									<input class="form-control" type="text" name="dept" id="dept" placeholder="Department" value="<?= $user['dept'];?>">
								</div>
								<div class="form-group">
									<label>Position</label>
									<input class="form-control" type="text" name="position" id="position" placeholder="Position" value="<?= $user['position'];?>">
								</div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary">Confirm</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal editProfile -->
      