<!-- partial:partials/_footer.html -->
<footer>
  <div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
        <span class="tx-14">Copyright © 2019 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
      </div>
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex justify-content-end">
        <div class="d-flex align-items-center">
          <a href="">Documentation</a>
          <span class="vertical-divider"></span>
          <a href="">FAQ</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- partial -->
</div>
</div>
</div>
<!-- plugins:js -->
<script src="<?= base_url() ?>assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?= base_url() ?>assets/vendors/chartjs/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= base_url() ?>assets/js/material.js"></script>
<script src="<?= base_url() ?>assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url() ?>assets/js/dashboard.js"></script>
<!-- End custom js for this page-->

<?php if ($this->uri->segment(2) == 'buku' || ($this->uri->segment(1) == 'member') && $this->uri->segment(2) == 'buku') { ?>
aaa
  <script src="<?= base_url() ?>assets/datatable/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/datatable/jquery-3.1.0.js"></script>
  <script src="<?= base_url() ?>assets/datatable/DataTables-1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $('#tabel-buku').DataTable();
  </script>
<?php } else if ($this->uri->segment(2) == 'anggota') { ?>
  <script src="<?= base_url() ?>assets/datatable/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/datatable/jquery-3.1.0.js"></script>
  <script src="<?= base_url() ?>assets/datatable/DataTables-1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $('#tabel-anggota').DataTable();
  </script>
<?php } ?>
</body>

</html>