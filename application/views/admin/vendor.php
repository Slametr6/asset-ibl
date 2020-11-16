      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Vendors
            <small>Vendors Managements</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addVendorModal">
								<i class="zmdi zmdi-plus"></i>Add vendor
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
						<th>Code</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Address</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php foreach($vendor as $val):?>
					  <tr>
						<td><?= $val->vendor_code;?></td>
						<td><?= $val->name;?></td>
						<td><?= $val->phone;?></td>
						<td><?= $val->email;?></td>
						<td><?= $val->address;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editVendorModal<?= $val->id;?>">
									<i class="fa fa-pencil"></i>
								</button>
								<button  class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('vendor/delvendor/'. $val->id);?>')">
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
	  
		<!-- modal addVendor -->
		<div class="modal fade" id="addVendorModal" tabindex="-1" role="dialog" aria-labelledby="addVendorModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addVendorModal">Add Vendor</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('vendor/addvendor');?>" method="post">
								<div class="form-group">
									<label>Vendor Code</label>
									<input class="form-control" type="text" name="vendor_code" id="vendor_code" placeholder="Vendor Code" required>
									<?= form_error('vendor_code','<small class="text-danger pl-3">','</small>');?>
								</div>
								<div class="form-group">
									<label>Vendor Name</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Vendor Name" required>
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" type="text" name="phone" id="phone" placeholder="Phone" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" type="text" name="address" id="address" placeholder="Address" required></textarea>
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
		<!-- end modal addVendor -->
		
		<!-- modal editVendor -->
		<?php $no = 0;
			foreach($vendor as $val): $no++;?>
		<div class="modal fade" id="editVendorModal<?= $val->id;?>" tabindex="-1" role="dialog" aria-labelledby="editVendorModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editVendorModal">Edit Vendor</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('vendor/editvendor');?>" method="post">
								<input type="hidden" name="id" id="id" value="<?= $val->id;?>" >
								<div class="form-group">
									<label>Vendor Code</label>
									<input class="form-control" type="text" name="vendor_code" id="vendor_code" placeholder="Vendor Code" value="<?= $val->vendor_code;?>" readonly>
								</div>
								<div class="form-group">
									<label>Vendor Name</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Vendor Name" value="<?= $val->name;?>" required>
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" type="text" name="phone" id="phone" placeholder="Phone" value="<?= $val->phone;?>" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?= $val->email;?>" required>
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" type="text" name="address" id="address" placeholder="Address" required><?= $val->address;?></textarea>
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
		<!-- end modal editVendor -->
