			<!-- modal Delete -->
			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Are you sure?</h4>
					</div>
					<div class="modal-body">Data will deleted permanently</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
					</div>
					</div>
				</div>
			</div>
			<!-- end modal Delete -->

			<footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="ironbird.id">Iron Bird Logistics.
      </footer>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

		<!-- jQuery 2.1.4 -->
		<script src="<?= base_url('assets/');?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets/');?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="<?= base_url('assets/');?>bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/morris/morris.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url('assets/');?>plugins/knob/jquery.knob.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url('assets/');?>plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?= base_url('assets/');?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/fastclick/fastclick.min.js"></script>
    <script src="<?= base_url('assets/');?>dist/js/app.min.js"></script>
    <script src="<?= base_url('assets/');?>dist/js/pages/dashboard.js"></script>
		<script src="<?= base_url('assets/');?>dist/js/demo.js"></script>
		<script>
			function deleteConfirm(url){
				$('#btn-delete').attr('href', url);
				$('#deleteModal').modal();
			}
		</script>
		<script type="text/javascript">
			$(".datepicker").datepicker({
					format: 'yyyy-mm-dd',
					autoclose: true,
					todayHighlight: true,
			});
			</script> 

  </body>
</html>
