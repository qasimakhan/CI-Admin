
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>CI-Admin</b> Version 1.0
    </div>
    <div class="text-center">
	    </strong> Made with <i class="fa fa-heart pulse heart"></i> in <a href="mailto:qasimakhan@gmail.com">Pakistan</a>.
	</div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<style>
.heart {
  color: #E90606;
  margin: 0 3px;
  font-size: 10px;
  animation: pound 0.35s infinite alternate;
  -webkit-animation: pound 0.35s infinite alternate;
}

@-webkit-keyframes pound {
  to {
    transform: scale(1.1);
  }
}
@keyframes pound {
  to {
    transform: scale(1.1);
  }
}
</style>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
  </body>
</html>