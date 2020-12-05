      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data of Location
            <small>Location Managements</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addLocationModal">
								<i class="zmdi zmdi-plus"></i>Add location
							</button>
						</div>
					</div>
                </div><!-- /.box-header -->
				<?= $this->session->userdata('message');?>
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
	  					<th width="20px">No</th>
						<th width="150px">Location Id</th>
						<th>Name</th>
						<th width="80px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					  		foreach($location as $val): $no++;?>
					  <tr>
	  					<td><?= $no;?></td>
						<td><?= $val->location_id;?></td>
						<td><?= $val->description;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('asset/dellocation/'. $val->location_id);?>')" >
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

		<!-- modal addLocation -->
		<div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="addLocationModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addLocationModal">Add Location</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('asset/addlocation');?>" method="post">
								<div class="form-group">
									<label>Location ID</label>
									<input class="form-control" type="text" name="location_code" id="location_code" value="30<?= sprintf("%04s", $location_id) ?>" readonly>
									<?= form_error('location_code','<small class="text-danger pl-3">','</small>');?>
								</div>
								<div class="form-group">
									<label>Location Name</label>
									<input class="form-control" type="text" name="description" id="description" placeholder="Location Name" required>
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
		<!-- end modal addLocation -->
