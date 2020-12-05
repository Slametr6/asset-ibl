      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Employee
            <small>Employee Managements</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addEmployeeModal">
								<i class="zmdi zmdi-plus"></i>Add employee
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
					    <th width="20px">No</th>
						<th>Employee ID</th>
						<th>Name</th>
						<th width="90px">Image</th>
						<th>Gender</th>
						<th>Birthday</th>
						<th>Email</th>
						<th>Phone</th>
						<th width="200px">Address</th>
						<th>Department</th>
						<th>Branch</th>
						<th width="80px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					 		foreach($employe as $emp): $no++;?>
					  <tr>
	  					<td><?= $no;?></td>
						<td><?= $emp->employe_id;?></td>
						<td><?= $emp->emp_name;?></td>
						<td><img width="80%" src="<?= base_url('assets/images/profile/'). $emp->image;?>" /></td>
						<td><?= $emp->gender;?></td>
						<td><?= date('d-m-Y', strtotime($emp->birthday));?></td>
						<td><?= $emp->email;?></td>
						<td><?= $emp->phone;?></td>
						<td><?= $emp->address;?></td>
						<td><?= $emp->dept;?></td>
						<td><?= $emp->branch;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#addEmployeeModal<?= $emp->employe_id;?>" >
									<i class="fa fa-pencil"></i>
								</button>
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('employe/delemploye/'. $emp->employe_id);?>')" >
									<i class="fa fa-trash-o" style="color:red"></i></a>
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

	  <!-- modal addEmployee -->
		<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addEmployeeModal">Add Employee</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('employe/addEmploye');?>" method="post">
								<div class="form-group">
									<label>Employee ID</label>
									<input class="form-control" type="text" name="employe_code" id="employe_code" value="18<?= sprintf("%06s", $employe_id);?>" readonly>
								</div>
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="emp_name" id="emp_name" placeholder="Full Name" value="<?= set_value('emp_name');?>" required>
								</div>
								<div class="form-group">
									<label>Gender</label>
									<select class="form-control" name="gender" id="gender" value="<?= set_value('gender');?>" required>
										<option value="">Select..</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								<div class="form-group">
									<label>Birthday</label>
									<input class="form-control datepicker" type="text" name="birthday" id="birthday" placeholder="Birthday" value="<?= set_value('birthday');?>" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email');?>" required>
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" type="text" name="phone" id="phone" placeholder="Phone" value="<?= set_value('phone');?>" required>
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" type="text" name="address" id="address" placeholder="Address" value="<?= set_value('address');?>" required></textarea>
								</div>
								<div class="form-group">
									<label>Department</label>
									<select class="form-control" name="dept" id="dept" value="<?= set_value('dept');?>" required>
										<option value="">Select..</option>
										<?php foreach($dept as $val):?>
										<option value="<?= $val->dept_id;?>"><?= $val->name;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Branch</label>
									<select class="form-control" name="branch" id="branch" value="<?= set_value('branch');?>" required>
										<option value="">Select..</option>
										<?php foreach($branch as $val):?>
										<option value="<?= $val->branch_id;?>"><?= $val->name;?></option>
					  					<?php endforeach;?>
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
		<!-- end modal addEmployee -->
		
		<!-- modal editEmployee -->
		<?php $no = 0;
			foreach($employe as $emp): $no++;?>
		<div class="modal fade" id="addEmployeeModal<?= $emp->employe_id;?>" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addEmployeeModal">Edit Employee</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<?= form_open_multipart('employe/editemploye');?>
								<div class="form-group">
									<label>Employee ID</label>
									<input class="form-control" type="text" name="employe_id" id="employe_id" value="<?= $emp->employe_id;?>" readonly>
								</div>
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" name="emp_name" id="emp_name" placeholder="Full Name" value="<?= $emp->emp_name;?>" required>
								</div>
								<div class="form-group">
									<div class="col-sm"> <label>Picture</label></div>
									<div class="col-sm">
										<img src="<?= base_url('assets/images/profile/').$emp->image;?>" class="img-thumbnail" width="150px" hight="150px" >
									</div>
									<div class="col-sm">
										<div class="custom-file">
										<input type="file" class=" form-control custom-file-input" id="image" name="image">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Gender</label>
									<select class="form-control" type="text" name="gender" id="gender">
										<option value="<?= $emp->gender;?>"><?= $emp->gender;?></option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								<div class="form-group">
									<label>Birthday</label>
									<input class="form-control datepicker" type="text" name="birthday" id="birthday" placeholder="Birthday" value="<?= $emp->birthday;?>" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?= $emp->email;?>" required>
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" type="text" name="phone" id="phone" placeholder="Phone" value="<?= $emp->phone;?>" required>
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" name="address" id="address" placeholder="Address" ><?= $emp->address;?></textarea>
								</div>
								<div class="form-group">
									<label>Department</label>
									<select class="form-control" name="dept" id="dept" required>
										<option value="<?= $emp->dept_id;?>"><?= $emp->dept;?></option>
										<?php foreach($dept as $val):?>
										<option value="<?= $val->dept_id;?>"><?= $val->name;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Branch</label>
									<select class="form-control" name="branch" id="branch" required>
										<option value="<?= $emp->branch_id;?>"> <?= $emp->branch;?></option>
										<?php foreach($branch as $val):?>
										<option value="<?= $val->branch_id;?>"><?= $val->name;?></option>
					  					<?php endforeach;?>
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
		<!-- end modal editEmployee -->
