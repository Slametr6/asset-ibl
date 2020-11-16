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
								<li><a href="#">PDF</a></li>
								<li><a href="#">Excel</a></li>
							</ul>
						</div>
					</div>
                </div><!-- /.box-header -->
				<?= $this->session->userdata('message');?>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>Name</th>
						<th>Username</th>
						<th>Image</th>
						<th>Role</th>
						<th>Is active</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Department</th>
						<th>Position</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php foreach($data as $val):?>
					  <tr>
						<td><?= $val->name;?></td>
						<td><?= $val->username;?></td>
						<td><img width="25%" src="<?= base_url('assets/images/profile/'). $val->image;?>" /></td>
						<td><?= $val->role_id;?></td>
						<td><?= $val->is_active;?></td>
						<td><?= $val->email;?></td>
						<td><?= $val->phone;?></td>
						<td><?= $val->address;?></td>
						<td><?= $val->dept;?></td>
						<td><?= $val->position;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editUserModal<?= $val->id;?>">
									<i class="fa fa-pencil"></i>
								</button>
								<button  class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('admin/deluser/'. $val->id);?>')">
									<i class="fa fa-trash"></i></a>
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
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addUserModal">Add User</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('admin/adduser');?>" method="post">
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="User Code" value="<?= set_value('name');?>" required>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?= set_value('username');?>" required>
									<?= form_error('username','<small class="text-danger pl-3">','</small>');?>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input class="form-control" type="password" name="password1" id="password1" placeholder="Confirm Password" required>
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
			foreach($data as $val): $no++;?>
		<div class="modal fade" id="editUserModal<?= $val->id;?>" tabindex="-1" role="dialog" aria-labelledby="editUserModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editUserModal">Edit User</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('admin/edituser');?>" method="post">
								<input type="hidden" name="id" id="id" value="<?= $val->id;?>" >
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Full Name" value="<?= $val->name;?>" >
								</div>
								<div class="form-group">
									<label>User Name</label>
									<input class="form-control" type="text" name="username" id="username" placeholder="User Name" value="<?= $val->username;?>" readonly>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?= $val->email;?>">
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number" value="<?= $val->phone;?>">
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" type="text" name="address" id="address" placeholder="Address" ><?= $val->address;?></textarea>
								</div>
								<div class="form-group">
									<label>Department</label>
									<input class="form-control" type="text" name="dept" id="dept" placeholder="Department" value="<?= $val->dept;?>">
								</div>
								<div class="form-group">
									<label>Position</label>
									<input class="form-control" type="text" name="position" id="position" placeholder="Position" value="<?= $val->position;?>">
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
