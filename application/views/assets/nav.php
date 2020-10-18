<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
  <div class="mdc-drawer__header">
    <a href="<?= base_url() ?>admin" class="brand-logo">
      <img src="<?= base_url() ?>assets/images/logo.svg" alt="logo">
    </a>
  </div>
  <div class="mdc-drawer__content">
    <div class="user-info">
      <p class="name"><span class="user-name"><?= $this->session->userdata('nama') ?></span></p>
      <!-- <p class="email">clydemiles@elenor.us</p> -->
    </div>
    <div class="mdc-list-group">
      <nav class="mdc-list mdc-drawer-menu">
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link" href="<?= base_url(); ?>admin">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
            Dashboard
          </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link" href="<?= base_url('admin/transaksi'); ?>">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">attach_money</i>
            Data Transaksi
          </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link" href="<?= base_url('admin/buku'); ?>">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">library_books</i>
            Data Buku
          </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link" href="<?= base_url('admin/anggota'); ?>">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">people</i>
            Data Anggota
          </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link" href="<?= base_url('admin/anggota'); ?>">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">description</i>
            Laporan
          </a>
        </div>
      </nav>
    </div>
    <div class="profile-actions">
      <a href="javascript:;">Settings</a>
      <span class="divider"></span>
      <a href="<?= base_url('admin/logout') ?>" role="button">Logout</a>
    </div>
  </div>
</aside>