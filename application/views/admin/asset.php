      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Products
            <small>Products Managements</small>
          </h1>
        </section>

        <!-- Main content -->      <!-- Content Wrapper. Contains page content -->
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
                <div class="box-body table-responsive">
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
						<th width="200px">Address</th>
						<th>Department</th>
						<th>Position</th>
						<th width="80px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php foreach($data as $val):?>
					  <tr>
						<td><?= $val->name;?></td>
						<td><?= $val->username;?></td>
						<td><img width="80%" src="<?= base_url('assets/images/profile/'). $val->image;?>" /></td>
						<td><?= $val->role_id;?></td>
						<td><?= $val->is_active;?></td>
						<td><?= $val->email;?></td>
						<td><?= $val->phone;?></td>
						<td><?= $val->address;?></td>
						<td><?= $val->dept;?></td>
						<td><?= $val->position;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editUserModal<?= $val->id;?>" >
									<i class="fa fa-pencil"></i>
								</button>
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('admin/deluser/'. $val->id);?>')" >
									<i class="fa fa-trash"></i></a>
								</button>
								<button class="item" data-toggle="tooltip" title="Reset">
									<a href="#!" onclick="resetPassword('<?= base_url('admin/resetPassword/'. $val->id);?>')" >
									<i class="fa fa-key"></i></a>
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

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                
				<?= $this->session->userdata('message');?>
                <h1>halaman asset</h1>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  
