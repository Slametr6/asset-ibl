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
