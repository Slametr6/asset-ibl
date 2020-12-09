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
								<input class="form-control" type="hidden" name="category" id="category" value="<?= set_value('category');?>" readonly>
								<div class="form-group">
									<label>No Equipment</label>
									<input class="form-control" type="text" name="no_eq" id="no_eq" placeholder="No Equipment" value="<?= set_value('no_eq');?>" required>
									
									<!-- <select class="form-control" name="no_eq" id="no_eq" value="<?= set_value('no_eq');?>" required>
									<option value="">Select..</option>
									</select> -->
								</div>
								<input class="form-control" type="hidden" name="no_asset" id="no_asset" value="<?= set_value('no_asset');?>" readonly>
								<input class="form-control" type="hidden" name="sn" id="sn" value="<?= set_value('sn');?>" readonly>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" type="text" name="descript" id="descript" placeholder="Description" value="<?= set_value('descript');?>" readonly></textarea>
								</div>
								<div class="form-group">
									<label>NIK</label>
									<!-- <input class="form-control" type="text" name="nik" id="nik" placeholder="NIK" value="<?= set_value('emp_name');?>" required> -->

									<select class="form-control" name="nik" id="nik" value="<?= set_value('nik');?>" required>
									<option value="">Select..</option>
									<?php foreach($employe as $emp):?>
									<option value="<?= $emp->nik;?>"><?= $emp->nik;?></option>
									<?php endforeach;?>
									</select>
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

		<!-- modal editAsset -->
		<!-- <?php $no = 0;
			foreach($asset as $ass): $no++;?>
		<div class="modal fade" id="editAssetModal<?= $ass->asset_id;?>" tabindex="-1" role="dialog" aria-labelledby="editAssetModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editAssetModal">Edit Asset</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<?= form_open_multipart('asset/editasset');?>
								<input class="form-control" type="hidden" name="asset_id" id="asset_id" value="<?= $ass->asset_id;?>" required>
								<div class="form-group">
									<label>Category</label>
									<select class="form-control" name="category" id="category" required>
										<option value="<?= $ass->cat_id;?>"> <?= $ass->category;?></option>
										<?php foreach($cat as $val):?>
										<option value="<?= $val->cat_id;?>"><?= $val->cat_name;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>No Equipment</label>
									<input class="form-control" type="text" name="no_eq" id="no_eq" placeholder="No Equipment" value="<?= $ass->no_eq;?>" required>
								</div>
								<div class="form-group">
									<label>No Asset</label>
									<input class="form-control" type="text" name="no_asset" id="no_asset" placeholder="No Asset" value="<?= $ass->no_asset;?>" required>
								</div>
								<div class="form-group">
									<label>Serial Number</label>
									<input class="form-control" type="text" name="sn" id="sn" placeholder="Serial Number" value="<?= $ass->sn;?>" required>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" name="descript" id="descript" placeholder="Description" ><?= $ass->descript;?></textarea>
								</div>
								<div class="form-group">
									<label>Location</label>
									<select class="form-control" name="location" id="location" required>
										<option value="<?= $ass->location_id;?>"> <?= $ass->location;?></option>
										<?php foreach($location as $val):?>
										<option value="<?= $val->location_id;?>"><?= $val->description;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Condition</label>
									<select class="form-control" name="conditions" id="conditions" required>
										<option value="<?= $ass->conditions;?>"> <?= $ass->conditions;?></option>
										<option value="ok">ok</option>
										<option value="broken">broken</option>
										<option value="scrapt">scrapted</option>
									</select>
								</div>
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status" id="status" required>
										<option value="<?= $ass->status;?>"> <?= $ass->status;?></option>
										<option value="not_use">not use</option>
										<option value="in_use">in use</option>
										<option value="archive">archive</option>
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
		<?php endforeach;?> -->
		<!-- end modal editAsset -->
