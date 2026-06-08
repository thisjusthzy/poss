</div>
<!-- /page content -->

<!-- footer content -->
        <footer>
          <div class="pull-right" style="font-size:12px;color:#a8b2c7;">
            <i class="fa fa-shopping-cart" style="color:#4dd9ac;margin-right:4px;"></i>
            <strong style="color:#7f1d1d;">POS System</strong> &mdash; Sistem Informasi Kasir
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('../vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('../vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('../vendors/fastclick/lib/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?= base_url('../vendors/nprogress/nprogress.js')?>"></script>
    <!-- Chart.js -->
    <script src="<?= base_url('../vendors/Chart.js/dist/Chart.min.js')?>"></script>
    <!-- gauge.js -->
    <script src="<?= base_url('../vendors/gauge.js/dist/gauge.min.js')?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= base_url('../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
    <!-- iCheck -->
    <script src="<?= base_url('../vendors/iCheck/icheck.min.js')?>"></script>
    <!-- Skycons -->
    <script src="<?= base_url('../vendors/skycons/skycons.js')?>"></script>
    <!-- Flot -->
    <script src="<?= base_url('../vendors/Flot/jquery.flot.js')?>"></script>
    <script src="<?= base_url('../vendors/Flot/jquery.flot.pie.js')?>"></script>
    <script src="<?= base_url('../vendors/Flot/jquery.flot.time.js')?>"></script>
    <script src="<?= base_url('../vendors/Flot/jquery.flot.stack.js')?>"></script>
    <script src="<?= base_url('../vendors/Flot/jquery.flot.resize.js')?>"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url('../vendors/flot.orderbars/js/jquery.flot.orderBars.js')?>"></script>
    <script src="<?= base_url('../vendors/flot-spline/js/jquery.flot.spline.min.js')?>"></script>
    <script src="<?= base_url('../vendors/flot.curvedlines/curvedLines.js')?>"></script>
    <!-- DateJS -->
    <script src="<?= base_url('../vendors/DateJS/build/date.js')?>"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('../vendors/jqvmap/dist/jquery.vmap.js')?>"></script>
    <script src="<?= base_url('../vendors/jqvmap/dist/maps/jquery.vmap.world.js')?>"></script>
    <script src="<?= base_url('../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url('../vendors/moment/min/moment.min.js')?>"></script>
    <script src="<?= base_url('../vendors/bootstrap-daterangepicker/daterangepicker.js')?>"></script>

    <!-- Datatables -->
    <script src="<?= base_url('../vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-buttons/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-buttons/js/buttons.flash.min.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-buttons/js/buttons.html5.min.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-buttons/js/buttons.print.min.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')?>"></script>
    <script src="<?= base_url('../vendors/datatables.net-scroller/js/dataTables.scroller.min.js')?>"></script>
    <script src="<?= base_url('../vendors/jszip/dist/jszip.min.js')?>"></script>
    <script src="<?= base_url('../vendors/pdfmake/build/pdfmake.min.js')?>"></script>
    <script src="<?= base_url('../vendors/pdfmake/build/vfs_fonts.js')?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('../build/js/custom.min.js')?>"></script>

    <!-- Force sidebar red after all JS (including mCustomScrollbar) has run -->
    <script>
      (function() {
        var RED = '#7f1d1d';
        var selectors = [
          '.col-md-3.left_col', '.left_col', '.left_col.scroll-view',
          '.left_col .mCustomScrollBox', '.left_col .mCSB_container',
          '.left_col .mCSB_draggerContainer', '.left_col .mCSB_scrollTools',
          '.main_menu_side', '#sidebar-menu', '.nav_title'
        ];
        function paintSidebar() {
          selectors.forEach(function(sel) {
            document.querySelectorAll(sel).forEach(function(el) {
              el.style.setProperty('background', RED, 'important');
              el.style.setProperty('background-color', RED, 'important');
            });
          });
        }
        // Run immediately
        paintSidebar();
        // Run after DOM settles (mCustomScrollbar adds elements after init)
        setTimeout(paintSidebar, 100);
        setTimeout(paintSidebar, 500);
        // Watch for dynamically added scrollbar elements
        var observer = new MutationObserver(paintSidebar);
        var leftCol = document.querySelector('.left_col');
        if (leftCol) {
          observer.observe(leftCol, { childList: true, subtree: true });
        }
      })();
    </script>
	
  </body>
</html>