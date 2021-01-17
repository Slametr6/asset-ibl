      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Users
            <small>Users Managements</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
				  <div class="margin">
						<div class="btn-group">
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addUserModal">
								<i class="zmdi zmdi-plus"></i>Add user
							</button>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-md-right">Export</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?= base_url('auth/printPDF');?>" target="_blank">PDF</a></li>
								<li><a href="<?= base_url('auth/exportExcel');?>">Excel</a></li>
							</ul>
						</div>
					</div>
                </div><!-- /.box-header -->
				<?= $this->session->userdata('message');?>
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					  	<th width="20px">No</th>
						<th>Name</th>
						<th>Username</th>
						<th width="70px">Image</th>
						<th>Role</th>
						<th>Is active</th>
						<th>Email</th>
						<th width="90px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					  		foreach($auth as $val): $no++;?>
					  <tr>
					  	<td><?= $no;?></td>
						<td><?= $val->user;?></td>
						<td><?= $val->username;?></td>
						<td><img width="40%" src="<?= base_url('assets/images/profile/'). $val->image;?>" /></td>
						<td><?= $val->role_id;?></td>
						<td><?= $val->is_active;?></td>
						<td><?= $val->email;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editUserModal<?= $val->user_id;?>" >
									<i class="fa fa-pencil"></i>
								</button>
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('auth/deluser/'. $val->user_id);?>')" >
									<i class="fa fa-trash-o" style="color:red"></i></a>
								</button>
								<button class="item" title="Reset Password" data-toggle="modal" data-target="#resetPasswordModal<?= $val->user_id;?>" >
									<i class="fa fa-key" style="color:blue"></i>
								</button>
							</div>
						</td>
					  </tr>
					  <?php endforeach;?>
                	</tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  
		<!-- modal addUser -->
		<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addUserModal">Add User</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('auth/adduser');?>" method="post">
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="user" id="user" placeholder="Full Name" value="<?= set_value('user');?>" required>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?= set_value('username');?>" required>
									<?= form_error('username','<small class="text-danger pl-3">','</small>');?>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
									<?= form_error('password','<small class="text-danger pl-3">','</small>');?>
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input class="form-control" type="password" name="password1" id="password1" placeholder="Confirm Password" required>
									<?= form_error('password1','<small class="text-danger pl-3">','</small>');?>
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
		<!-- end modal addUser -->
		
		<!-- modal editUser -->
		<?php $no = 0;
			foreach($auth as $val): $no++;?>
		<div class="modal fade" id="editUserModal<?= $val->user_id;?>" tabindex="-1" role="dialog" aria-labelledby="editUserModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editUserModal">Edit User</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<?= form_open_multipart('auth/edituser');?>
								<input type="hidden" name="user_id" id="user_id" value="<?= $val->user_id;?>" >
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="user" id="user" placeholder="Full Name" value="<?= $val->user;?>" >
								</div>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?= $val->username;?>" readonly >
								</div>
								<div class="form-group">
									<div class="col-sm"> <label>Picture</label></div>
									<div class="col-sm">
										<img src="<?= base_url('assets/images/profile/').$val->image;?>" class="img-thumbnail" width="150px" hight="150px" >
									</div>
									<div class="col-sm">
										<div class="custom-file">
										<input type="file" class=" form-control custom-file-input" id="image" name="image">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?= $val->email;?>">
								</div>
								<div class="form-group">
									<label>Role ID</label>
									<select class="form-control" name="role_id" id="role_id" required>
										<option value="<?= $val->id;?>"><?= $val->role_id;?></option>
										<?php foreach($role as $r):?>
										<option value="<?= $r->id;?>"><?= $r->role;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Is Active?</label>
									<select class="form-control" name="is_active" id="is_active">
										<option value="<?= $val->is_active;?>"><?= $val->is_active;?></option>
										<option value="1">1 : Active</option>
										<option value="0">0 : Not Active</option>
									</select>
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
		<?php endforeach;?>
		<!-- end modal editUser -->
		
		<!-- modal resetPasswordModal -->
		<?php $no = 0;
			foreach($auth as $val): $no++;?>
		<div class="modal fade" id="resetPasswordModal<?= $val->user_id;?>" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="resetPasswordModal">Reset Password</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('auth/resetPassword');?>" method="post">
								<input type="hidden" name="user_id" id="user_id" value="<?= $val->user_id;?>" >
								<div class="form-group">
									<label for="password1">New Password</label>
									<input type="password" class="form-control" id="password1" name="password1" placeholder="New Password" required>
								</div>
								<div class="form-group">
									<label for="password2">Repeat Password</label>
									<input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password" required>
								</div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button id="btn-reset" type="submit" class="btn btn-primary">Confirm</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
		<!-- end modal resetPasswordModal -->
