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
								<li><a href="<?= base_url('asset/printPDF');?>" target="_blank">PDF</a></li>
								<li><a href="<?= base_url('asset/expExcel');?>">Excel</a></li>
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
						<td><?= $val->dept_id;?></td>
						<td><?= $val->branch_id;?></td>
						<td><?= $val->location;?></td>
						<td><?= $val->qty;?></td>
						<td><?= $val->unit;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editUserAssetModal<?= $val->userasset_id;?>" >
									<i class="fa fa-pencil"></i>
								</button>
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('asset/delUserAsset/'. $val->userasset_id);?>')" >
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
									<select class="form-control" name="no_eq" id="no_eq" value="<?= set_value('no_eq');?>" required>
										<option value="">Select..</option>
										<?php foreach($notuse as $ass):?>
										<option value="<?= $ass->no_eq;?>"><?= $ass->no_eq;?> - <?= $ass->descript;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<!-- <div class="form-group">
									<label>Description</label>
									<input class="form-control" type="text" name="descript" id="descript" placeholder="Description" readonly>
								</div> -->
								<div class="form-group">
									<label>Location</label>
									<select class="form-control" name="location" id="location" value="<?= set_value('location');?>" required>
										<option value="">Select..</option>
										<?php foreach($location as $loc):?>
										<option value="<?= $loc->location_id;?>"><?= $loc->description;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>User</label>
									<select class="form-control" name="nik" id="nik" value="<?= set_value('nik');?>" required>
										<option value="">Select..</option>
										<?php foreach($employe as $emp):?>
										<option value="<?= $emp->nik;?>"><?= $emp->emp_name;?> - <?= $emp->nik;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Quantity</label>
									<input class="form-control" type="text" name="qty" id="qty" placeholder="Quantity" value="1" readonly>
								</div>
								<div class="form-group">
									<label>Unit</label>
									<select class="form-control" name="unitId" id="unitId" value="<?= set_value('unitId');?>" required>
										<option value="">Select..</option>
										<?php foreach($unitt as $unit):?>
										<option value="<?= $unit->unit_id;?>"><?= $unit->unit;?></option>
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
		<!-- end modal addUserAsset -->

		<!-- modal editUserAsset -->
		<?php $no = 0;
			foreach($userasset as $val): $no++;?>
		<div class="modal fade" id="editUserAssetModal<?= $val->userasset_id;?>" tabindex="-1" role="dialog" aria-labelledby="editUserAssetModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editUserAssetModal">Edit User Asset</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<?= form_open_multipart('asset/edituserasset');?>
								<input class="form-control" type="hidden" name="userasset_id" id="userasset_id" value="<?= $val->userasset_id;?>" required>
								<div class="form-group">
									<label>No Equipment</label>
									<select class="form-control" name="no_eq" id="no_eq" required>
										<option value="<?= $val->no_eq;?>"><?= $val->no_eq;?> - <?= $val->category;?></option>
										<?php foreach($asset as $ass):?>
										<option value="<?= $ass->no_eq;?>"><?= $ass->no_eq;?> - <?= $ass->category;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<!-- <div class="form-group">
									<label>Description</label>
									<textarea class="form-control" type="text" name="descript" id="descript" placeholder="Description" readonly></textarea>
								</div> -->
								<div class="form-group">
									<label>Location</label>
									<select class="form-control" name="location" id="location" required>
										<option value="<?= $val->location_id;?>"> <?= $ass->location;?></option>
										<?php foreach($location as $loc):?>
										<option value="<?= $loc->location_id;?>"><?= $loc->description;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>NIK</label>
									<select class="form-control" name="nik" id="nik" required>
										<option value="<?= $val->nik;?>"><?= $val->nik;?> - <?= $val->emp_name;?></option>
										<?php foreach($employe as $emp):?>
										<option value="<?= $emp->nik;?>"><?= $emp->nik;?> - <?= $emp->emp_name;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Quantity</label>
									<input class="form-control" type="text" name="qty" id="qty" placeholder="Quantity" value="1" readonly>
								</div>
								<div class="form-group">
									<label>Unit</label>
									<select class="form-control" name="unitId" id="unitId" required>
										<option value="<?= $val->unit_id;?>"><?= $val->unit;?></option>
										<?php foreach($unitt as $unt):?>
										<option value="<?= $unt->unit_id;?>"><?= $unt->unit;?></option>
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
		<!-- end modal editUserAsset -->
