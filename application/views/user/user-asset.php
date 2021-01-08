      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of User Asset
            <small>User Asset Managements</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addUserAssetModal">
								<i class="zmdi zmdi-plus"></i>Add user asset
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
						<th>Category</th>
						<th>No Equipment</th>
						<th>No Asset</th>
						<th>Serial Number</th>
						<th width="200px">Description</th>
						<th>Employee</th>
						<th>Department</th>
						<th>Branch</th>
						<th>Location</th>
						<th>Qty</th>
						<th>Unit</th>
						<th>Condition</th>
						<th>Status</th>
						<th width="50px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					 		foreach($userasset as $val): $no++;?>
					  <tr>
	  					<td><?= $no;?></td>
						<td><?= $val->category;?></td>
						<td><?= $val->no_eq;?></td>
						<td><?= $val->no_asset;?></td>
						<td><?= $val->sn;?></td>
						<td><?= $val->descript;?></td>
						<td><?= $val->emp_name;?></td>
						<td><?= $val->dept;?></td>
						<td><?= $val->branch;?></td>
						<td><?= $val->location;?></td>
						<td><?= $val->qty;?></td>
						<td><?= $val->unit_id;?></td>
						<td><?= $val->conditions;?></td>
						<td><?= $val->status;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editAssetModal<?= $val->userasset_id;?>" >
									<i class="fa fa-pencil"></i>
								</button>
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('asset/delasset/'. $val->userasset_id);?>')" >
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

	  <!-- modal addUserAsset -->
		<div class="modal fade" id="addUserAssetModal" tabindex="-1" role="dialog" aria-labelledby="addUserAssetModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addUserAssetModal">Add User Asset</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('asset/adduserasset');?>" method="post">
								<div class="form-group">
									<label>No Equipment</label>
									<input class="form-control" type="text" name="no_eq" id="no_eq" placeholder="No Equipment" value="<?= set_value('no_eq');?>" required>
								</div>
								<input class="form-control" type="hidden" name="category" id="category" value="<?= set_value('category');?>" readonly>
								<input class="form-control" type="hidden" name="no_asset" id="no_asset" value="<?= set_value('no_asset');?>" readonly>
								<input class="form-control" type="hidden" name="sn" id="sn" value="<?= set_value('sn');?>" readonly>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" type="text" name="descript" id="descript" placeholder="Description" value="<?= set_value('descript');?>" readonly></textarea>
								</div>
								<div class="form-group">
									<label>NIK</label>
									<input class="form-control" type="text" name="nik" id="nik" value="<?= set_value('nik');?>" onkeyup="fill_emp()" required>
								</div>
								<div class="form-group">
									<label>Employee</label>
									<input class="form-control" type="text" name="emp_name" id="emp_name" placeholder="Employee" value="<?= set_value('emp_name');?>" readonly>
								</div>
								<input class="form-control" type="hidden" name="gender" id="gender" value="<?= set_value('gender');?>" readonly>
								<div class="form-group">
									<label>Department</label>
									<input class="form-control" type="text" name="dept" id="dept" placeholder="Department" value="<?= set_value('dept');?>" readonly>
								</div>
								<input class="form-control" type="hidden" name="branch" id="branch" value="<?= set_value('branch');?>" readonly>
								<div class="form-group">
									<label>Location</label>
									<input class="form-control" type="text" name="location" id="location" placeholder="Location" value="<?= set_value('location');?>" readonly>
								</div>
								<div class="form-group">
									<label>Quantity</label>
									<input class="form-control" type="text" name="qty" id="qty" placeholder="Quantity" value="1" readonly>
								</div>
								<div class="form-group">
									<label>Unit</label>
									<select class="form-control" name="unit_id" id="unit_id" value="<?= set_value('unit_id');?>" required>
										<option value="">Select..</option>
										<?php foreach($unit as $unit):?>
										<option value="<?= $unit->unit_id;?>"><?= $unit->unit;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<input class="form-control" type="hidden" name="conditions" id="conditions" value="<?= set_value('conditions');?>" readonly>
								<input class="form-control" type="hidden" name="status" id="status" value="<?= set_value('status');?>" readonly>
								
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
		<!-- end modal addUserAsset -->
