	<script src="<?= base_url('assets/');?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?= base_url('assets/');?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
