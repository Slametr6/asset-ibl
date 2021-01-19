      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Asset
            <small>Asset Managements</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addAssetModal">
								<i class="zmdi zmdi-plus"></i>Add asset
							</button>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-md-right">Export</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?= base_url('asset/cetakPDF');?>" target="_blank">PDF</a></li>
								<li><a href="<?= base_url('asset/exportExcel');?>">Excel</a></li>
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
						<th>Location</th>
						<th>Condition</th>
						<th>Status</th>
						<th width="50px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					 		foreach($asset as $ass): $no++;?>
					  <tr>
	  					<td><?= $no;?></td>
						<td><?= $ass->category;?></td>
						<td><?= $ass->no_eq;?></td>
						<td><?= $ass->no_asset;?></td>
						<td><?= $ass->sn;?></td>
						<td><?= $ass->descript;?></td>
						<td><?= $ass->location;?></td>
						<td><?= $ass->conditions;?></td>
						<td><?= $ass->status;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editAssetModal<?= $ass->asset_id;?>" >
									<i class="fa fa-pencil"></i>
								</button>
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('asset/delasset/'. $ass->asset_id);?>')" >
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

	  <!-- modal addAsset -->
		<div class="modal fade" id="addAssetModal" tabindex="-1" role="dialog" aria-labelledby="addAssetModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addAssetModal">Add Asset</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('asset/addasset');?>" method="post">
								<div class="form-group">
									<label>Category</label>
									<select class="form-control" name="category" id="category" value="<?= set_value('category');?>" required>
										<option value="">Select..</option>
										<?php foreach($cat as $c):?>
										<option value="<?= $c->cat_id;?>"><?= $c->cat_name;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>No Equipment</label>
									<input class="form-control" type="text" name="eq_code" id="eq_code" value="602<?php echo sprintf("%04s", $no_eq) ?>" readonly>
								</div>
								<div class="form-group">
									<label>No Asset</label>
									<input class="form-control" type="text" name="no_asset" id="no_asset" placeholder="No Asset" value="<?= set_value('no_asset');?>" required>
								</div>
								<div class="form-group">
									<label>Serial Number</label>
									<input class="form-control" type="text" name="sn" id="sn" placeholder="Serial Number" value="<?= set_value('sn');?>" required>
								</div>
								
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" type="text" name="descript" id="descript" placeholder="Description" value="<?= set_value('descript');?>" required></textarea>
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
		<!-- end modal addAsset -->

		<!-- modal editAsset -->
		<?php $no = 0;
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
										<option value="<?= $ass->cat_id;?>"><?= $ass->category;?></option>
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
									<textarea class="form-control" name="descript" id="descript" placeholder="Description" required><?= $ass->descript;?></textarea>
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
		<?php endforeach;?>
		<!-- end modal editAsset -->
